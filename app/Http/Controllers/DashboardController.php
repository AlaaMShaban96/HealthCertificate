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
use App\Http\Requests\DeleteRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use App\Models\Request as PatientRequest;

class DashboardController extends Controller
{
    public function index()
    {
        $tests=Test::where('selected',1)->get();
        $identityTypes=IdentityType::all();
        $nationalitys=Nationality::all();
        return view('new.index',compact('tests','identityTypes','nationalitys'));
    }
    public function unique()
    {
        $test= Test::where('unique',1)->first();
        $identityTypes=IdentityType::all();
        $nationalitys=Nationality::all();
        return view('new.unique.index',compact('test','identityTypes','nationalitys'));
    }
    public function unique_store(Request $request)
    {
        // dd($request->all());
        $request['age']=Carbon::parse($request->birth_date)->age;
        $request['unique']=1;
        $patient=Patient::create($request->all());
        $patientRequest= RequestService::createRequest($request,$patient,Test::UNIQUE);
        return RequestService::printResult( $patientRequest,$patient,Test::UNIQUE);

    }
    public function print(Patient $patient,PatientRequest $request)
    {
      return  RequestService::printResult($request,$patient);
    }
    public function showRemovePage(Request $request)
    {
       $patients= Patient::filter($request->all())->orderBy('id', 'DESC')->paginateFilter(10);
       return view('new.remove.index',compact('patients'));
    }
    public function remove(DeleteRequest $request)
    {
        if(isset($request->date['start'])) $start =  now()->setDateFrom($request->date['start'])->startOfDay() ;
       if(isset($request->date['end'])) $end = now()->setDateFrom($request->date['end'])->endOfDay();
        if (isset($start) &&$end ) {
            Patient::whereBetween('created_at',  [$start,$end])->delete();
            Session::flash('message', 'تمت حدف البيانات بنجاح');

            return redirect()->back();
        }
    }
}
