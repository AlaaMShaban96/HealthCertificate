<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\NationalityRequest;

class NationalityController extends Controller
{
    public function index()
    {
        $nationalities=Nationality::paginate(10);
        return view('nationality.index',compact('nationalities'));
    }
    public function show(Nationality $nationality)
    {
        return view('nationality.edit',compact('nationality'));

    }
    public function store(NationalityRequest $request)
    {
        $nationality=Nationality::create($request->all());
        Alert::toast('تم التسجيل بنجاح', 'success')->position('top-end')->autoClose(5000);
        event( new CreateUsersLog(auth()->user(), 'store', 'تم الاضافة الجنسية ('.$nationality->name.')'));
        return redirect('nationality/');

    }
    public function update(NationalityRequest $request , Nationality $nationality)
    {
       $nationality->update($request->all());
       Alert::toast('تم التعديل بنجاح', 'success')->position('top-end')->autoClose(5000);
       event( new CreateUsersLog(auth()->user(), 'update', 'تم التعديل الجنسية ('.$nationality->name.')'));
       return redirect('nationality/');
    }

    public function destroy(Nationality $nationality)
    {
        try {
            DB::beginTransaction();
            event( new CreateUsersLog(auth()->user(), 'destroy', 'تمت الحدف الجنسية ('.$nationality->name.')'));

            $nationality->delete();
            Alert::toast('تم الحدف بنجاح', 'success')->position('top-end')->autoClose(5000);

            DB::commit();
            Session::flash('message', 'تمت حدف البيانات بنجاح');

        } catch (\Throwable $th) {
            DB::rollback();
            // dd('h;og');
            return redirect('nationality/')->withErrors(['errors'=>'تأكد من عدم وجود سجلات تحت الجنسية']);
        }
        return redirect('nationality/');


    }
}
