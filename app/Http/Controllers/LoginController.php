<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use App\Models\Role;
use Laratrust\LaratrustFacade as Laratrust;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */

    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request):RedirectResponse
    {
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
     
        if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->user();
            if ($user->Laratrust::hasRole('administrateur')) {
                return redirect('/adminHome');
            } elseif ($user->Laratrust::hasRole('super-administrateur')) {
                return redirect('/superAdminHome');
            } elseif ($user->Laratrust::hasRole('validateur')) {
                return redirect('/validatorHome');
            } else {
                return redirect('/demandeurHome');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address and Password are wrong.');
        }
          
     
        /*$credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        */
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
