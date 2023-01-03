<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\NationalityRequest;

class NationalityController extends Controller
{
    public function index()
    {
        $nationalities=Nationality::paginate(10);
        return view('new2.nationality.index',compact('nationalities'));
    }
    public function show(Nationality $nationality)
    {
        return view('nationality.edit',compact('nationality'));

    }
    public function update(NationalityRequest $request , Nationality $nationality)
    {
       $nationality->update($request->all());
       return redirect('nationality/');
    }
    public function store(NationalityRequest $request)
    {
        Nationality::create($request->all());
        Session::flash('message', 'تمت حدف البيانات بنجاح');

        return redirect('nationality/');

    }
    public function destroy(Nationality $nationality)
    {
        try {
            DB::beginTransaction();
            $nationality->delete();
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
