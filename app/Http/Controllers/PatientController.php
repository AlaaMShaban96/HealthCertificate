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
        $identityTypes=IdentityType::all();
        $tests=Test::where('selected',1)->get();
       $patients= Patient::filter($request->all())->paginateFilter();
       return view('patient.index',compact('patients','identityTypes','tests'));
    }
    public function show(Patient $patient)
    {
        $identityTypes=IdentityType::all();
        $nationalitys=Nationality::all();
        return view('patient.edit',compact('patient','identityTypes','nationalitys'));

        # code...
    }
    public function store(Request $request)
    {
        $request['age']=Carbon::parse($request->birth_date)->age;
        $patient=Patient::create($request->all());
       
        $patientRequest=  RequestService::CreateRequest($request,$patient);
        // $tests_is_negative=Test::all()->except($request->tests);
        // $patientRequest= PatientRequest::create(['patient_id'=>$patient->id]);

        // if (isset($request->tests)) {
        //     foreach ($request->tests as  $test_id) {
        //         Result::create([
        //             'request_id'=>$patientRequest->id,
        //             'test_id'=>$test_id,
        //             'value'=>Test::find($test_id)->first()->positive,
        //         ]);
        //     }

        // }
                   
        // foreach ($tests_is_negative as  $test) {
        //     Result::create([
        //         'request_id'=>$patientRequest->id,
        //         'test_id'=>$test->id,
        //         'value'=>$test->negative,
        //     ]);
        // }
       
        Session::flash('message', 'تمت الإضافة بنجاح');

        return redirect('/');        
        
    }
    public function destroy(Patient $patient)
    {
        $patient->delete();
        Session::flash('message', 'تمت الحدف بنجاح');
        return redirect('/patient');        

    }
}
