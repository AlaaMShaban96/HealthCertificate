<?php

namespace App\Http\Controllers;

use App\Models\IdentityType;
use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\IdentityTypeRequest;

class IdentityTypeController extends Controller
{
    public function index()
    {
        $identityTypes=IdentityType::paginate(10);
        return view('identityType.index',compact('identityTypes'));
    }
    public function show(IdentityType $identityType)
    {
        return view('identityType.edit',compact('identityType'));

    } 
    public function store(IdentityTypeRequest $request)
    {
        $identityType=dentityType::create($request->all());
        Alert::toast('تم التسجيل بنجاح', 'success')->position('top-end')->autoClose(5000);
        event( new CreateUsersLog(auth()->user(), 'store', 'تم الاضافة المستندات ('.$identityType->name.')'));
        return redirect('identityType/');

    }
    public function update(IdentityTypeRequest $request , IdentityType $identityType)
    {
       $identityType->update($request->all());
       Alert::toast('تم التعديل بنجاح', 'success')->position('top-end')->autoClose(5000);
       event( new CreateUsersLog(auth()->user(), 'update', ' تم التعديل  المستندات ('.$identityType->name.')'));
        return redirect('identityType/');
    }

    public function destroy(IdentityType $identityType)
    {
        event( new CreateUsersLog(auth()->user(), 'destroy', 'تم الحدف المستندات ('.$identityType->name.')'));
        $identityType->delete();
        Alert::toast('تم الحدف بنجاح', 'success')->position('top-end')->autoClose(5000);
        return redirect('identityType/');
    }
}
