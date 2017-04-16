<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\SocialProvider;
use Socialite;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/registerupdateprofile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


      /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        /*
         Working Part
       // $user = Socialite::driver($provider)->user();
           $user =  \Socialite::driver($provider)
                    ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                    ->user();
           dd($user);         

        // $user->token;

        */

        try
        {
            $socialUser = \Socialite::driver($provider)
              ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->user();

             //dd($socialUser);    
        }
        catch(\Exception $e)
        {
             
              return redirect('/');
        }
    
            
   $account = SocialProvider::whereProvider($provider)
            ->whereProviderId($socialUser->getId())
            ->first();

        if ($account) {
          

            $user = User::whereEmail($socialUser->getEmail())->first();
            auth()->login($user);
         //Auth::login($account);
        return redirect()->route('home')->with('info','Logged In successfully');

        } else {

            $account = new SocialProvider([
                'provider_id' => $socialUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($socialUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $socialUser->getEmail(),
                    'name' => $socialUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            //return $user;
             auth()->login($user);

      //return redirect()->route('registerupdateprofile');
      return view('user.registerUpdateProfile');

        }



    }
}
