<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Auth;
use Exception;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
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
protected $redirectTo = RouteServiceProvider::dashboard;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    

 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    

       public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            
        
            $githubUser = Socialite::driver('github')->user();
            $existUser = User::where('email',$githubUser->email)->first();
            

            if($existUser) {
                Auth::loginUsingId($existUser->id);
            }
            else {
                $user = new User;
                $user->name = $githubUser->name;
                $user->email = $githubUser->email;
                $user->google_id = $githubUser->id;
                $user->password = md5(rand(1,10000));
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/dashboard');
        } 
        catch (Exception $e) {
            return 'error';
        }
    }

        // $user->token;
    

}
