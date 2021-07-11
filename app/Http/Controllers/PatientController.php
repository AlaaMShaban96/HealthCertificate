<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Test;
use App\Models\Result;
use App\Models\Patient;
use App\Models\Nationality;
use App\Models\IdentityType;
use Illuminate\Http\Request;
use App\Services\RequestService;
use Illuminate\Support\Facades\Session;
use App\Models\Request as PatientRequest;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $identityTypes=IdentityType::all();
        $tests=Test::where('selected',1)->get();
       $patients= Patient::filter($request->all())->orderBy('id', 'DESC')->paginateFilter(10);
       return view('patient.index',compact('patients','identityTypes','tests'));
    }
    public function show(Patient $patient)
    {
        $identityTypes=IdentityType::all();
        $nationalitys=Nationality::all();
        return view('patient.edit',compact('patient','identityTypes','nationalitys'));
    }
    public function store(Request $request)
    {
        $request['age']=Carbon::parse($request->birth_date)->age;
        $patient=Patient::create($request->all());
        $patientRequest=  RequestService::CreateRequest($request,$patient);   
        Session::flash('message', 'تمت الإضافة بنجاح');
        return redirect('/');        
    }
    public function update(Request $request,Patient $patient)
    {
        $patient->age=Carbon::parse($request->birth_date)->age;
        $patient->update($request->all());
        Session::flash('message', 'تمت التعديل بنجاح');
        return redirect('/patient');        
    }
    public function destroy(Patient $patient)
    {
        $patient->delete();
        Session::flash('message', 'تمت الحدف بنجاح');
        return redirect('/patient');        

    }
}
