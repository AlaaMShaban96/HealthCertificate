<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;

class TestController extends Controller
{
    public function index()
    {
        $tests=Test::paginate(10);
        return view('new.test.index',compact('tests'));
    }
    public function show(Test $test)
    {
        return view('test.edit',compact('test'));

    }
    public function update(TestRequest $request , Test $test)
    {
        !isset($request->positive)?$request['positive']="موجبة":'';
        !isset($request->negative)?$request['negative']="خالي من فيروس ".$request->name_ar:'';
       $test->update($request->all());
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
       return response()->json(['error'=>false], 200);
    }
    public function selected(Request $request , Test $test)
    {
       $test->selected=$request->selected=='true'?1:0;
       $test->save();
       return response()->json(['error'=>false], 200);
    }
    public function store(TestRequest $request)
    {
        !isset($request->positive)?$request['positive']="موجبة":'';
        !isset($request->negative)?$request['negative']="خالي من فيروس ".$request->name_ar:'';
        Test::create($request->all());
        return redirect('test/');

    }
    public function destroy(Test $test)
    {
        $test->delete();
        return redirect('test/');
    }
}
