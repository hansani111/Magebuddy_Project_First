<?php

namespace App\Http\Controllers\EmpAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmpAuth\LoginRequest;
use App\Models\Emp;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('emp.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // $request->authenticate();

        // $request->session()->regenerate();
        // dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (!Auth::guard('emp')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            // dd("yes");
            return redirect()->intended('/emp/dashboard/emp_project');

        }



        // $request->authenticate();

        // // dd($data);

        // $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::EMP_DASHBOARD);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('emp')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/emp/login');
    }
}