<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
use App\Http\Requests\BranchRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BranchController extends Controller
{
    public function index()
    {
        $branches=Branch::paginate(10);
        return view('branches.index',compact('branches'));
    } 
    public function store(BranchRequest $request)
    {
        $branch=Branch::create($request->all());
        Alert::toast('تم التسجيل بنجاح', 'success')->position('top-end')->autoClose(5000);
        event( new CreateUsersLog(auth()->user(), 'store', 'تم الاضافة فرع ('.$branch->name.')'));
        return redirect('branches/');

    }
    public function update(BranchRequest $request , Branch $branch)
    {
       $branch->update($request->all());
       Alert::toast('تم التعديل بنجاح', 'success')->position('top-end')->autoClose(5000);
       event( new CreateUsersLog(auth()->user(), 'update', 'تم التعديل فرع ('.$branch->name.')'));
       return redirect('branches/');
    }
    public function destroy(Branch $branch)
    {
        event( new CreateUsersLog(auth()->user(), 'destroy', 'تم الحدف فرع ('.$branch->name.')'));
        $branch->delete();
        Alert::toast('تم الحدف بنجاح', 'success')->position('top-end')->autoClose(5000);
        return redirect('branches/');
    }
    public function profile(Request $request ,Branch $branch)
    {
        $security=$request->security??false;
        return view('branches.profile',compact('branch','security'));
    }
}
