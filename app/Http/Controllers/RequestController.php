<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Patient;
// use App\Models\Request;
use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
use App\Services\RequestService;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class RequestController extends Controller
{
   public function show(Patient $request )
   {
        $tests=Test::all();
        return view('request.index',compact('request','tests'));
   }
  public function store(Request $request,Patient $patient)
   {
      $request['branch_id']=auth()->user()->branch_id;
      $request['user_id']=auth()->user()->id;
      $patientRequest= RequestService::createRequest( $request,$patient,false,'create');
      //   return RequestService::printResult( $patientRequest,$patient);
      Alert::toast('تم التسجيل بنجاح', 'success')->position('top-end')->autoClose(5000);
      event( new CreateUsersLog(auth()->user(), 'store', 'تم الاضافة طلب إصدار شهادة ('.$patientRequest->request_number.')')); 
      return  redirect()->back();
   }
   public function update(Request $request,Patient $patient)
   {
      $patientRequest= RequestService::createRequest( $request,$patient,false,'update');

      //   return RequestService::printResult( $patientRequest,$patient);
      Alert::toast('تم التعديل بنجاح', 'success')->position('top-end')->autoClose(5000);
      event( new CreateUsersLog(auth()->user(), 'update', 'تم التعديل طلب إصدار شهادة ('.$patientRequest->request_number.')'));
      return  redirect()->back();
   }
}
