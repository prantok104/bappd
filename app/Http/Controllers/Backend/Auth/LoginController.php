<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Login Page
    public function loginIndexPage()
    {
        return view("Backend.authenticate.auth.login");
    }

    // Login check
    public function loginAuthCheck(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $request->validate([
                    'email' => 'required|email',
                    'password' => 'required|min:5'
                ]);

                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('admin.dashboard.page');
                } else {
                    return back()->with("error", "Email or password is incorrect");
                }
            } else {
                return back()->with("error", "Something went wrong. Please try again");
            }
        } catch (\Exception $e) {
            return back()->with("error", "Something went wrong. Please try again");
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.authentication.login.page')->with('logout_success_message', 'Logout successfully completed');
    }
}
