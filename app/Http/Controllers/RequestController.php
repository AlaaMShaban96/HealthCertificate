<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Patient;
// use App\Models\Request;
use Illuminate\Http\Request;
use App\Services\RequestService;
use Illuminate\Support\Facades\Session;
class RequestController extends Controller
{
   public function show(Patient $request )
   {
        $tests=Test::all();
        return view('new.request.index',compact('request','tests'));
   }
  public function store(Request $request,Patient $patient)
   {
     $patientRequest= RequestService::createRequest( $request,$patient,false,'create');

   //   return RequestService::printResult( $patientRequest,$patient);
      Session::flash('message', 'تمت الاضافة بنجاح');
      return  redirect()->back();
   }
  public function update(Request $request,Patient $patient)
   {
     $patientRequest= RequestService::createRequest( $request,$patient,false,'update');

   //   return RequestService::printResult( $patientRequest,$patient);
      Session::flash('message', 'تمت الحفظ بنجاح');
      return  redirect()->back();
   }
}
