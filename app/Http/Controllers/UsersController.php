<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users=User::paginate(10);
        $branches=Branch::pluck('name','id');

        return view('users.index',compact('users','branches'));
    } 
    public function store(UserRequest $request)
    {
        $request['password']  = Hash::make($request->password);
        User::create($request->all());
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
       return redirect('users/');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users/');
    }
}
