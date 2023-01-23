<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
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
       // validate the request...
         $request->validate([
              'code' => 'required|exists:users,code',
              'password' => 'required',
         ]);
         // check if the user exist in the database and redirect to the dashboard
            if (Auth::attempt(['code' => $request->code, 'password' => $request->password])) {
                Alert::toast('تم تسجيل الدخول بنجاح ✌️', 'success')->position('top-end')->autoClose(5000);
                event( new CreateUsersLog(auth()->user(), 'login', ' تم تسجيل الدخول بنجاح ('.date('H:m:s Y-d-m ').') '));
                return redirect()->to('/');
            }  
            Alert::error('خطاء ', 'الرجاء التاكد من كلمة السر و الريد الالكتروني ');

            // if the user not exist in the database redirect to the login page with error message
            return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');

    }
    // logout function
    public function logout() {
        event( new CreateUsersLog(auth()->user(), 'logout', 'تم تسجيل الخروج بنجاح ( '.date('H:m:s Y-d-m ').')'));
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
