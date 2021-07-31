<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Repositories\LoginAttemptsRepository;
use App\Repositories\SessionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @param SessionRepository $sessionRepository
     * @param LoginAttemptsRepository $loginAttemptsRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(LoginRequest $request, SessionRepository $sessionRepository, LoginAttemptsRepository $loginAttemptsRepository)
    {
        $request->authenticate();

        $session = $sessionRepository->getSessionByUserId($request->user()->id);

        if($session && $session->isNotEmpty()) {

            $loginAttemptsRepository->store([
                'user_id' => $request->user()->id,
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'action' => 'Account Locked',
            ]);

            Auth::logout();

            /** Ideally you want to make the error message below more generic to prevent user enumeration, but since this is for testing purposes whatever. */
            return redirect()->route('login')->withErrors(['email' => 'Account locked down.']);
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
