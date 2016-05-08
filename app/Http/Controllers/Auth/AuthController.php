<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Pokemon;

use Mail;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
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
            'fullname' =>'required|max:255',
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'birthday' => 'required|before: 3 years ago|after: 100 years ago',
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
        $user = User::create([
            'fullname' =>$data['fullname'],
            'name' => $data['name'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'password' => bcrypt($data['password']),
            'pokemons_owned' => 5,
            
        ]);

        $username = $user->name;
        //create random pokemons for user on registration
        $totalStrength = 0;
        for($j = 0; $j < 5; $j++)
        { 
            $pokemon = new Pokemon;
                //creating random name
                $chars = 'abcdefghijklmnopqrstuvwxyz';
                $charsLength = strlen($chars);
                $randomName = '';
                for($i = 0; $i < 6; $i++)
                {
                    $randomName .= $chars[rand(0, $charsLength - 1)];
                }
                $randomStrength = rand(1, 100);
            $pokemon->name = $randomName;
            $pokemon->strength = $randomStrength;
            $totalStrength += $pokemon->strength;
            $user->army_strength = $totalStrength;
            $user->save();
            $user->pokemon()->save($pokemon);
        }

        //Send email after user registration
        Mail::send('emails.welcome_mail', array('username' => $username), function($message) use($user) {
            $message->to($user->email, $user->name)->subject('Welcome to the Pokemon Game');
        });

        
        return $user;
    }
}
