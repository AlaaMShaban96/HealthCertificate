<?php

namespace App\Http\Controllers;

use PDF; 
use Carbon\Carbon;
use App\Models\Test;
use App\Models\Patient;
use App\Models\Nationality;
use App\Models\IdentityType;
use Illuminate\Http\Request;
use App\Services\RequestService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Models\Request as PatientRequest;

class DashboardController extends Controller
{
    public function index()
    {   
        $tests=Test::where('selected',1)->get();
        $identityTypes=IdentityType::all();
        $nationalitys=Nationality::all();
        return view('welcome',compact('tests','identityTypes','nationalitys'));
    }
    public function unique()
    {   
        $test= Test::where('unique',1)->first();
        $identityTypes=IdentityType::all();
        $nationalitys=Nationality::all();
        return view('unique.index',compact('test','identityTypes','nationalitys'));
    }
    public function unique_store(Request $request)
    {
        $request['age']=Carbon::parse($request->birth_date)->age;
        $patient=Patient::create($request->all());
        $patientRequest= RequestService::CreateRequest($request,$patient,Test::UNIQUE);
        return RequestService::printResult( $patientRequest,$patient,Test::UNIQUE);

    }
    public function print(Patient $patient,PatientRequest $request)
    {
      return  RequestService::printResult($request,$patient);
    }
}
