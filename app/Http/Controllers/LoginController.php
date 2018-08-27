<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Session;
use App\Models\Core\User;
use App\Models\Core\SocialProvider;
use App\Models\Core\Settings;
use App\Models\Core\Customer_Management;

use Auth;
use Socialite;

class LoginController extends Controller
{
    function index () {
        return view('pages.login');
    }

    function register () {
        return view('pages.signup');
    }

    function authenticate (Request $request) {        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);        
        $user_data = array(
            'email' => $request->get('email'), 
            'password' => $request->get('password')
        );
        if (Auth::attempt($user_data)) {     
            $user = User::where('email', $user_data["email"])->first();                        
            $lang = Settings::where('user_id', $user->id)->first(); 
            Session::put('locale', $lang->df_lang);   
            return ["user" => Auth::user(), "check"=> Auth::check()];
        } else {
            return ['error' => 'Wrong Login Details', "check"=> Auth::check()];
        }
    }

    function logout (){
        session()->flush();
        Auth::logout();
        return redirect()->route('home');
    }

    function signup (Request $request) {  
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        $userData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ];
        if (User::where('email', $userData["email"])->first()) {
            return "User is already exist!";            
        } else {
            return User::create($userData);
        }
    } 

    public function redirectToProvider($provider) {       
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback ($provider) {     
        $socialUser = Socialite::driver($provider)->user();       
        if ($socialUser->getId()) {
            $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->first();        
            if (!$socialProvider) {                
                $user = User::create(['email' => $socialUser->getEmail(),'name' => $socialUser->getName()]);            
                SocialProvider::create(['user_id' => $user->id, 'provider_id' => $socialUser->getId(), 'provider' => $provider]);
                Auth::login($user);
                $lang = Settings::where('user_id', $user->id)->first(); 
                Session::put('locale', $lang->df_lang);               
            }
            else {            
                $user_id = $socialProvider->user_id;
                $user = User::where('id', $user_id)->first();
                Auth::login($user);
                $lang = Settings::where('user_id', $user->id)->first();
                Session::put('locale', $lang->df_lang);   
            }     
            
            return redirect('dashboard');
        }  else {
            return redirect('auth/' + $provider);
        }                   
    }
}
