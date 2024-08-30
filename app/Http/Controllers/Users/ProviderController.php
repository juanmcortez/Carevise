<?php

namespace App\Http\Controllers\Users;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Users\Provider;
use App\Models\Commons\Address;
use App\Models\Commons\Demographic;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\Users\StoreProviderRequest;
use App\Http\Requests\Users\UpdateProviderRequest;

class ProviderController extends Controller
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
                ],
                [
                    'title' => 'Disabled providers',
                    'items' => [
                        'List' => ['routename' => 'providers.disabled.list', 'icon' => 'user-detail'],
                    ]
                ],
            ]
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // If the user is a provider
        if (Auth::user()->is_user_provider) {
            $this->submenu['sections'] = array_filter($this->submenu['sections'], function ($section) {
                return $section['title'] !== 'Users';
            });
            $this->submenu['sections'] = array_values($this->submenu['sections']);
            //
            $providerList = Provider::allProvidersExceptMyself();
        } else {
            $providerList = Provider::allTheProviders();
        }
        //
        return view('providers.index', [
            'providers' => $providerList,
            'submenu' => $this->submenu
        ]);
    }

    /**
     * Display a listing of the disabled resource.
     */
    public function disabled(): View
    {
        // If the user is a provider
        if (Auth::user()->is_user_provider) {
            $this->submenu['sections'] = array_filter($this->submenu['sections'], function ($section) {
                return $section['title'] !== 'Users';
            });
            $this->submenu['sections'] = array_values($this->submenu['sections']);
        }
        //
        return view('providers.disabled', [
            'inactive' => Provider::allTheProvidersInactive(),
            'submenu' => $this->submenu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // If the user is a provider
        if (Auth::user()->is_user_provider) {
            $this->submenu['sections'] = array_filter($this->submenu['sections'], function ($section) {
                return $section['title'] !== 'Users';
            });
            $this->submenu['sections'] = array_values($this->submenu['sections']);
        }
        //
        return view('providers.profile.create', ['submenu' => $this->submenu]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProviderRequest $request): RedirectResponse
    {
        // If the user is a provider
        if (Auth::user()->is_user_provider) {
            $this->submenu['sections'] = array_filter($this->submenu['sections'], function ($section) {
                return $section['title'] !== 'Users';
            });
            $this->submenu['sections'] = array_values($this->submenu['sections']);
        }
        //
        //
        $prvdValid                      = Arr::except($request->validated(), 'demographic');
        $demoValid                      = $request->validated('demographic');
        //
        $prvdValid['is_active']         = true;
        $prvdValid['is_user_provider']  = true;
        $valid_dob                      = $request->validated('demographic.date_of_birth');
        $demoValid['date_of_birth']     = Carbon::createFromFormat('M d, Y', $valid_dob)->format('Y-m-d');
        //
        $prvdDemog                      = Arr::except($demoValid, 'address');
        $prvdAddrs                      = $request->validated('demographic.address');
        // $prvdPhone                   = $request->validated('demographic.phone');
        // $prvdCellphone               = $request->validated('demographic.cellphone');
        //
        $provider = Provider::create($prvdValid);
        $prvdDemog = $provider->demographic()->create($prvdDemog);
        $prvdAddrs = $prvdDemog->address()->create($prvdAddrs);
        // $prvdPhone = $prvdDemog->address()->create($prvdPhone);
        // $prvdCellphone = $prvdDemog->address()->create($prvdCellphone);
        //
        $prvdDemog->update(['address_id' => $prvdAddrs->id]);
        $provider->update(['demographic_id' => $prvdDemog->id]);
        // $provider->demographic->phone->update($userPhone);
        // $provider->demographic->cellphone->update($userCellphone);
        //
        if ($provider) {
            $message = "<strong>{$provider->demographic->complete_name}</strong> created!";
            return Redirect::route('providers.list')->with('success', $message);
        } else {
            $message = 'There was an error creating the provider information.';
            return Redirect::to('providers.profile.create', ['submenu' => $this->submenu])->with('alert', $message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider): View
    {
        // If the user is a provider
        if (Auth::user()->is_user_provider) {
            $this->submenu['sections'] = array_filter($this->submenu['sections'], function ($section) {
                return $section['title'] !== 'Users';
            });
            $this->submenu['sections'] = array_values($this->submenu['sections']);
        }
        //
        return view('providers.profile.edit', ['provider' => $provider, 'submenu' => $this->submenu]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProviderRequest $request, Provider $provider): RedirectResponse
    {
        // If user changes - which does not has to happen!
        if ($request->validated('username') != $provider->username) {
            return view('providers.profile.edit', ['provider' => $provider])
                ->with('alert', 'You are not allowed to change the username!');
        }

        // If email changes
        if ($request->safe()->only('email') != $provider->email) {
            $provider->email_verified_at = null;
        }

        // Pre-fill user values with validated info
        $provider->fill($request->safe()->except('demographic'));

        // Force self user to never disable it-self
        if (Auth::user()->username == $provider->username) {
            $provider->is_active = true;
        }

        // Pre-fill demographic values with validated info
        $demographicData = collect($request->safe()->only('demographic'))->collapse();
        $provider->demographic->fill($demographicData->all());
        $provider->demographic->address->fill($demographicData->get('address'));

        // Correct date formatting
        $provider->demographic->date_of_birth = Carbon::createFromFormat('M d, Y', $demographicData->get('date_of_birth'))->format('Y-m-d');

        if ($provider->save() && $provider->demographic->save() && $provider->demographic->address->save()) {
            if (!$provider->is_active) {
                $message = "<strong>{$provider->demographic->complete_name}</strong> has been deactivated.";
                return Redirect::route('providers.list')->with('info', $message);
            } elseif (!$provider->is_user_provider) {
                $message = "<strong>{$provider->demographic->complete_name}</strong> is not longer a provider.";
                return Redirect::route('users.profile', ['user' => $provider])->with('info', $message);
            } else {
                $message = "<strong>{$provider->demographic->complete_name}</strong> updated!";
                return Redirect::route('providers.list')->with('success', $message);
            }
        } else {
            $message = 'There was an error updating the user information.';
            return Redirect::route('providers.profile', ['provider' => $provider])->with('warning', $message);
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

        return Redirect::route('providers.profile', ['provider' => $request->user()])
            ->with('success', "<strong>{$request->user()->demographic->complete_name}</strong> password has been updated succesfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider): RedirectResponse
    {
        $provName = $provider->demographic->complete_name;
        //
        $provider->demographic->address->delete();
        $provider->demographic->delete();
        $provider->update(['is_active' => false]);
        $provider->delete();
        //
        return Redirect::route('providers.list')
            ->with('warning', "<strong>{$provName}</strong> has been deleted per your request!");
    }
}
