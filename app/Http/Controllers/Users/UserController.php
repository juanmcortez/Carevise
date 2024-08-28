<?php

namespace App\Http\Controllers\Users;

use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\Users\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Commons\Demographic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller
{
    private $submenu;

    public function __construct(array $submenu = [])
    {
        $this->submenu = [
            'sections' => [
                [
                    'title' => 'Users',
                    'items' => [
                        'List' => ['routename' => 'users.list', 'icon' => 'user-detail'],
                        'Create' => ['routename' => 'users.create', 'icon' => 'user-plus'],
                    ]
                ],
                [
                    'title' => 'Providers',
                    'items' => [
                        'List' => ['routename' => 'providers.list', 'icon' => 'user-detail'],
                        'Create' => ['routename' => 'providers.create', 'icon' => 'user-plus'],
                    ]
                ]
            ],
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $submenu = $this->submenu;
        $users = User::join('demographics', 'demographics.id', '=', 'users.demographic_id')
            ->select('users.*')
            ->whereIsUserProvider(false)
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->orderBy('middle_name')
            ->paginate(15);
        return view('users.index', compact('users', 'submenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.profile.create', ['submenu' => $this->submenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $userData = $request->except('demographic');
        $demgData = Arr::collapse($request->only('demographic'));
        //
        $demgData['date_of_birth'] = Carbon::createFromFormat('M j, Y', $demgData['date_of_birth'])->format('Y-m-d');
        $userData['demographic_id'] = Demographic::factory()->create($demgData)->id;
        $user = User::create($userData);
        //
        if ($user) {
            $message = "<strong>{$user->demographic->complete_name}</strong> created!";
            return Redirect::route('users.list')->with('success', $message);
        } else {
            $message = 'There was an error creating the user information.';
            return Redirect::to('users.profile.create', ['submenu' => $this->submenu])->with('alert', $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.profile.edit', ['user' => $user, 'submenu' => $this->submenu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        // If user changes - which does not has to happen!
        if ($request->validated('username') != $user->username) {
            return view('users.profile.edit', ['user' => $user])
                ->with('alert', 'You are not allowed to change the username!');
        }

        // If email changes
        if ($request->safe()->only('email') != $user->email) {
            $user->email_verified_at = null;
        }

        // Pre-fill user values with validated info
        $user->fill($request->safe()->except('demographic'));

        // Force self user to never disable it-self
        if (Auth::user()->username == $user->username) {
            $user->is_active = true;
        }

        // Pre-fill demographic values with validated info
        $demographicData = collect($request->safe()->only('demographic'))->collapse();
        $user->demographic->fill($demographicData->all());

        // Correct date formatting
        $user->demographic->date_of_birth = Carbon::createFromFormat('M d, Y', $demographicData->get('date_of_birth'))->format('Y-m-d');

        if ($user->save() && $user->demographic->save()) {
            if (!$user->is_active) {
                $message = "<strong>{$user->demographic->complete_name}</strong> has been deactivated.";
                return Redirect::route('users.list')->with('info', $message);
            } elseif ($user->is_user_provider) {
                $message = "<strong>{$user->demographic->complete_name}</strong> is now a provider.";
                return Redirect::route('providers.profile', ['provider' => $user])->with('info', $message);
            } else {
                $message = "<strong>{$user->demographic->complete_name}</strong> updated!";
                return Redirect::route('users.list')->with('success', $message);
            }
        } else {
            $message = 'There was an error updating the user information.';
            return Redirect::route('users.profile', ['user' => $user])->with('warning', $message);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function passwordupdate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return Redirect::back()->with('success', 'The user password has been updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'user_current_password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->demographic->delete();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('login')->with('info', 'Your account has been deleted per your request!');
    }
}
