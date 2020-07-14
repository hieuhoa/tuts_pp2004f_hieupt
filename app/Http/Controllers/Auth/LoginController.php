<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $providerUser = Socialite::with($provider)
            ->user();
        } 
        catch (\Exception $e) 
        {
            return redirect('/login')->with('oauth_error', '予期せぬエラーが発生しました');
        }

        $existingUser = User::where('email', $providerUser->getEmail())
        ->first();

        if ($existingUser) {
            Auth::login($existingUser, true);
        } 
        else //The account has no users,登録まだなら
        {
            $user                    = new User;
            $user->provider_name     = $provider;
            $user->provider_id       = $providerUser->getId();
            $user->name              = $providerUser->getName();
            $user->email             = $providerUser->getEmail();
            $user->avatar            = $providerUser->getAvatar();

            $user->save();
            Auth::login($user, true);
        }

        return redirect($this->redirectTo);
    }
}
