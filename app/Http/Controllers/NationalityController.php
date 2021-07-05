<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;
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
    public function update(NationalityRequest $request , Nationality $nationality)
    {
       $nationality->update($request->all());
       return redirect('nationality/');
    }
    public function store(NationalityRequest $request)
    {
        Nationality::create($request->all());
        return redirect('nationality/');

    }
    public function destroy(Nationality $nationality)
    {
        $nationality->delete();
        return redirect('nationality/');
    }
}
