<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;

class BranchController extends Controller
{
    public function index()
    {
        $branches=Branch::paginate(10);
        return view('branches.index',compact('branches'));
    } 
    public function store(BranchRequest $request)
    {
        Branch::create($request->all());
        return redirect('branches/');

    }
    public function update(BranchRequest $request , Branch $branch)
    {
       $branch->update($request->all());
       return redirect('branches/');
    }
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect('branches/');
    }
    public function profile(Request $request ,Branch $branch)
    {
        $security=$request->security??false;
        return view('branches.profile',compact('branch','security'));
    }
}
