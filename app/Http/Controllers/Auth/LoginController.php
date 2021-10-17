<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        try {
            if (request()->input('token')) {
                $token = request()->input('token');

                if ($token == env('PANEL_TOKEN')) {
                    return view('auth.login');
                } else {
                    abort(404);
                }
            } else {
                abort(404);
            }
        } catch (Exception $exception) {
            abort(404);
        }
    }

    protected function sendFailedLoginResponse(LoginRequest $request)
    {
        throw ValidationException::withMessages([
            'failed' => [trans('auth.failed')]
        ]);
    }

    protected function attemptLogin(LoginRequest $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), request()->filled('remember')
        );
    }

    protected function credentials(LoginRequest $request)
    {
        $username = $request->get('user_name');

        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        return [
            $field => $username,
            'password' => $request->password
        ];
    }

    public function login(LoginRequest $request)
    {
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendLoginResponse(LoginRequest $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : $this->redirectPath();
    }

    public function redirectPath()
    {
        return redirect()->route('dashboard');
    }
}
