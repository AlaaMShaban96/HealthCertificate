<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Test;
use App\Models\Result;
use App\Models\Patient;
use App\Models\Nationality;
use App\Models\IdentityType;
use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
use App\Services\RequestService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
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
        try {
            DB::transaction(function () use($request) {
                $request['age']=Carbon::parse($request->birth_date)->age;
                $request['branch_id']=auth()->user()->branch_id;
                $request['user_id']=auth()->user()->id;
                $patient=Patient::create($request->all());
                $patientRequest=  RequestService::CreateRequest($request,$patient);
                Alert::toast('تم التسجيل بنجاح', 'success')->position('top-end')->autoClose(5000);
                event( new CreateUsersLog(auth()->user(), 'store', 'تم الاضافة  مريض('.$patient->name.')'));            
                
            });

        } catch (\Throwable $th) {
            DB::rollback();
            Alert::toast('هناك مشكلة في عملية التسجيل ', 'error')->position('top-center')->autoClose(5000);
            return redirect()->back()->withInput();
        }
        return redirect('/');

    }
    public function update(Request $request,Patient $patient)
    {
        $patient->age=Carbon::parse($request->birth_date)->age;
           //if request have file store it
        if($request->hasFile('image')){
            // convert image to base64
            $image = $request->file('image');
            $image_base64 ="data:image/jpeg;base64,". base64_encode(file_get_contents($image->getRealPath()));
            $request->merge(['photo'=>$image_base64]);
        }
        else {
            $request['photo']=$patient->photo;
        }
        $patient->update($request->all());
        Alert::toast('تم التعديل بنجاح', 'success')->position('top-end')->autoClose(5000);
        event( new CreateUsersLog(auth()->user(), 'update', 'تم التعديل مريض ('.$patient->name.')'));
        return redirect('/patient');
    }
    public function destroy(Patient $patient)
    {
        event( new CreateUsersLog(auth()->user(), 'destroy', 'تمت الحدف مريض ('.$patient->name.')'));
        $patient->delete();
        Alert::toast('تم الحدف بنجاح', 'success')->position('top-end')->autoClose(5000);
        return redirect('/patient');

    }
}
