<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Events\CreateUsersLog;
use App\Http\Requests\TestRequest;
use RealRashid\SweetAlert\Facades\Alert;

class TestController extends Controller
{
    public function index()
    {
        $tests=Test::paginate(10);
        return view('test.index',compact('tests'));
    }
    public function show(Test $test)
    {
        return view('test.edit',compact('test'));

    } 
    public function store(TestRequest $request)
    {
        !isset($request->positive)?$request['positive']="موجبة":'';
        !isset($request->negative)?$request['negative']="خالي من فيروس ".$request->name_ar:'';
        $test=Test::create($request->all());
        Alert::toast('تم التسجيل بنجاح', 'success')->position('top-end')->autoClose(5000);
        event( new CreateUsersLog(auth()->user(), 'store', 'تم الاضافة التحليل ('.$test->name.')'));
        return redirect('test/');

    }
    public function update(TestRequest $request , Test $test)
    {
        !isset($request->positive)?$request['positive']="موجبة":'';
        !isset($request->negative)?$request['negative']="خالي من فيروس ".$request->name_ar:'';
        $test->update($request->all());
        Alert::toast('تم التعديل بنجاح', 'success')->position('top-end')->autoClose(5000);
        event( new CreateUsersLog(auth()->user(), 'update', 'تم التعديل  التحليل('.$test->name_ar.')'));
        return redirect('test/');
    }
    public function unique (Request $request , Test $test)
    {
       $lastTest= Test::where('unique',1)->first();
        if (isset($lastTest)) {
            $lastTest->unique=0;$lastTest->save();
        }
       $test->unique=1;
       $test->save();
       event( new CreateUsersLog(auth()->user(), 'unique', ' تم تحديدالتحليل المنفرد ('.$test->name_ar.')'));

       return response()->json(['error'=>false], 200);
    }
    public function selected(Request $request , Test $test)
    {
       $test->selected=$request->selected=='true'?1:0;
       $test->save();
       event( new CreateUsersLog(auth()->user(), 'selected', 'تم اختيار التحليل العام ('.$test->name_ar.')'));
       return response()->json(['error'=>false], 200);
    }

    public function destroy(Test $test)
    {
        event( new CreateUsersLog(auth()->user(), 'destroy', 'تم الحدف التحليل ('.$test->name_ar.')'));
        $test->delete();
        Alert::toast('تم الحدف بنجاح', 'success')->position('top-end')->autoClose(5000);
        return redirect('test/');
    }
}
