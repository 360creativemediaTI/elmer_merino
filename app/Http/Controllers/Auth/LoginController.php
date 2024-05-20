<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        Log::info('Attempting login for email: ' . $request->email);

        $credentials = $request->only($this->username(), 'password');
        Log::info('Credentials: ', $credentials);

        return $credentials;
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);
        Log::info('Attempting login with credentials: ', $credentials);
    
        $guard = $this->guard();
        Log::info('Guard: ', ['guard' => get_class($guard)]);
    
        $attempt = $guard->attempt($credentials, $request->filled('remember'));
        Log::info('Attempt result: ', ['result' => $attempt]);
    
        if ($attempt) {
            Log::info('Login successful for email: ' . $request->email);
            return true;
        }
    
        Log::error('Login attempt failed for email: ' . $request->email);
        return false;
    }
    

    protected function sendFailedLoginResponse(Request $request)
    {
        Log::error('Login failed for email: ' . $request->email);
        Log::error('Request data: ', $request->all());

        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
