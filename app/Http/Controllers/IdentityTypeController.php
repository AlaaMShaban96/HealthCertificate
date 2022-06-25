<?php

namespace App\Http\Controllers;

use App\Models\IdentityType;
use Illuminate\Http\Request;
use App\Http\Requests\IdentityTypeRequest;

class IdentityTypeController extends Controller
{
    public function index()
    {
        $identityTypes=IdentityType::paginate(10);
        return view('new.identityType.index',compact('identityTypes'));
    }
    public function show(IdentityType $identityType)
    {
        return view('identityType.edit',compact('identityType'));

    }
    public function update(IdentityTypeRequest $request , IdentityType $identityType)
    {
       $identityType->update($request->all());
       return redirect('identityType/');
    }
    public function store(IdentityTypeRequest $request)
    {
        IdentityType::create($request->all());
        return redirect('identityType/');

    }
    public function destroy(IdentityType $identityType)
    {
        $identityType->delete();
        return redirect('identityType/');
    }
}
