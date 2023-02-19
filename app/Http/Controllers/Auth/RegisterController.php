<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
   {
       if (auth::user()->type == 'admin') {
           return '/admin';
       }
       else if(auth::user()->type == 'customer'){
          return '/app';
       }

   }

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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
        [
            'password.min' => 'minimum 8 caractères',
            'password.confirmed' => 'la confirmation du mot de passe ne correspond pas',
            'password.regex' =>'confirmer le mot de passe  ',
            'email.unique' => 'ce email existe déja',
            'email.email' => 'e-mail doit être une adresse e-mail valide.',
            'phone.unique' => 'ce numéro existe déja',
            'password.required'=>'le mot de passe est obligatoire',
            'first_name.required' => 'nom est obligatoire',
            'last_name.required' => 'prenom est obligatoire',
            'email.required' => 'e-mail est obligatoire',
            'phone.required' => 'telephone est obligatoire',
        ]
    );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'type' =>'customer',
            'password' => Hash::make($data['password']),
        ]);
    }
}
