<?php

namespace App\Http\Controllers\Users;

use Carbon\Carbon;
use App\Models\Users\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;

class UserController extends Controller
{
    private $submenu;

    public function __construct(array $submenu = [])
    {
        $this->submenu = [
            'section' => [
                'title' => 'Users',
                'items' => [
                    'List' => ['routename' => 'users.list', 'icon' => 'user-detail'],
                    'Create' => ['routename' => 'dashboard', 'icon' => 'user-plus'],
                ]
            ]
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submenu = $this->submenu;
        $users = User::whereIsUserProvider(false)->get();

        return view('users.index', compact('users', 'submenu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        abort(404);
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
    public function edit(User $user)
    {
        return view('users.profile.edit', ['user' => $user, 'submenu' => $this->submenu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
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
            $message = 'User updated!';
            return redirect()->route('users.profile', ['user' => $user])->with('success', $message);
        } else {
            $message = 'There was an error updating the user information.';
            return redirect()->route('users.profile', ['user' => $user])->with('alert', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort(404);
    }
}
