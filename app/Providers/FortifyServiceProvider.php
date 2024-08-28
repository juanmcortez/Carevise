<?php

namespace App\Providers;

use App\Models\Users\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Actions\Fortify\UpdateUserProfileInformation;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // This code redirects new registerd users to its profile page for completion
        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
            public function toResponse($request)
            {
                return redirect()
                    ->route('users.profile', ['user' => $request->user()])
                    ->with('success', '<strong>Welcome!!</strong> Your new account has been created!<br />Please fill in all the necessary information before continuing!');
            }
        });
        // This code redirects new registerd users to its profile page for completion
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Custom views for authentication
        Fortify::loginView(function () {
            return view('auth.login');
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        Fortify::resetPasswordView(function (Request $request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        /*Fortify::confirmPasswordView(function () {
            return view('auth.confirm-password');
        });

        Fortify::verifyEmailView(function () {
            return view('auth.verify-email');
        });*/
        // Custom views for authentication

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('username', $request->username)->first();
            if ($user && !$user->is_active) {
                // If the user is not active, throw a ValidationException
                $userType = ($user->is_user_provider) ? 'provider' : 'user';
                throw ValidationException::withMessages([
                    Fortify::username() => "The {$userType} account is inactive. Please contact the administrator for asistance.",
                ]);
            }
            if ($user && Hash::check($request->password, $user->password)) {
                return $user;
            }
        });

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }
}
