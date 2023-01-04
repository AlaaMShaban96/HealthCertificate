<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // login view
    public function loginView()
    {
        return view('auth.login');
    }
    //login function 
    public function login(Request $request)
    {
        Alert::error('Error Title', 'Error Message');
       // validate the request...
         $request->validate([
              'email' => 'required|exists:users,email',
              'password' => 'required',
         ]);
         // check if the user exist in the database and redirect to the dashboard
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->to('/');
            }  
            // if the user not exist in the database redirect to the login page with error message
            return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');

    }
    // logout function
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
    // dashboard function
    public function dashboard()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Home"], ['name' => "Index"]
        ];
        return view('content.home', [
            'breadcrumbs' => $breadcrumbs
        ]);
    }
    
}
