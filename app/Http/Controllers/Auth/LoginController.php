<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
/* use Illuminate\Support\Facades\Auth; */


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     *
     * login api *
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'], 401);
        }
        $user = Auth::user();
        $tokenResult = $user->createToken('Instituto Personal Access Client');
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => $tokenResult->token->expires_at,
        ]);

    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return view('home');  
        
       
    }

    public function findOrCreateUser($user,$provider){
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser){
            return $authUser;
        }

        $user_database = new User;
        $user_database->name = $user->name;
        $user_database->email = $user->email;
        $user_database->provider = 'google';
        $user_database->provider_id = $user->id;
        $user_database->password = md5(rand(1,10000));
        $user_database->save();
        return $user_database;
        
        /* return User::create([
            'name'=> $user->name,
            'email'=> $user->email,
            'email_verified_at'=> $user->email,
            'provider' => 'google',
            'provider_id' => $user->getId(),
            'password' => md5(rand(1,10000)),
            
        ]); */
    }

}
