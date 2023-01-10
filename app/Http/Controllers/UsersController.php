<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    public function index()
    {
        $users=(auth()->user()->role=="admin" || auth()->user()->role=="admin") ? User::where('branch_id',auth()->user()->branch_id)->paginate(10): User::paginate(10);
        $branches=Branch::pluck('name','id');

        return view('users.index',compact('users','branches'));
    } 
    public function store(UserRequest $request)
    {
        $request['password']  = Hash::make($request->password);
        $user=User::create($request->all());
        Alert::toast('تم التسجيل بنجاح', 'success')->position('top-end')->autoClose(5000);
        event( new CreateUsersLog(auth()->user(), 'store', 'تم الاضافة  مستخدم ('.$user->name.')'));
        return redirect('users/');

    }
    public function update(UserRequest $request , User $user)
    {
        if ($request->has('password')) {
            $request['password']  = Hash::make($request->password);
        }else{
            $request['password'] = $user->password;
        }
        $user->update($request->all());
        Alert::toast('تم التعديل بنجاح', 'success')->position('top-end')->autoClose(5000);
        event( new CreateUsersLog(auth()->user(), 'update', 'تم التعديل مستخدم ('.$user->name.')'));
        return redirect('users/');
    }
    public function destroy(User $user)
    {
        event( new CreateUsersLog(auth()->user(), 'destroy', 'تم الحدف مستخدم ('.$user->name.')'));
        $user->delete();
        Alert::toast('تم الحدف بنجاح', 'success')->position('top-end')->autoClose(5000);

        return redirect('users/');
    }
    public function profile(Request $request ,User $user)
    {
        $security=$request->security??false;
        return view('users.profile',compact('user','security'));
    }
}
