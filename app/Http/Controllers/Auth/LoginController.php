<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Favoriteline;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        if(Auth::user()){
            $favorite = Favorite::where('user_id',Auth::user()->id)->first();
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
        }
        else{
            $favorite = session()->get('favorite_id');
            $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
        }
        $error = null;
        return view('auth.login',compact('count_favorite_lines','error'));
    }

     public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Ce champ est obligatoire',
            'password.required' => 'Ce champ est obligatoire',
        ]
        );

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'email';
        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;

        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password']),$remember_me))
        {
            if(auth::user()->type == 'admin'){
                return redirect('/admin');
            }
            if(auth::user()->type == 'customer'){
                if(auth::user()->status == 0  || auth::user()->status == 2){
                 return redirect('/test-login');
                }
                else{
                    return redirect('/app');
                }

            }
        }
        else{
            $error = 'Coordonnées incorrectes. Veuillez réessayer.';
            if(Auth::user()){
                $favorite = Favorite::where('user_id',Auth::user()->id)->first();
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite->id)->count();
            }
            else{
                $favorite = session()->get('favorite_id');
                $count_favorite_lines = Favoriteline::where('favorite_id',$favorite)->count();
            }
            return view('auth.login',compact('error','count_favorite_lines'));
        }

    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
