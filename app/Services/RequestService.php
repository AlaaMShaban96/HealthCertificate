<?php
namespace App\Services;

use App\Models\Test;
use App\Models\Result;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\File;
use App\Models\Request as PatientRequest;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class RequestService 
{
    public static function createRequest(Request $request,Patient $patient,$unique=false)
    {
        
        $tests_is_negative=Test::where('selected',1)->get()->except($request->tests);
        $patientRequest= PatientRequest::create(['patient_id'=>$patient->id]);
        if ($unique) {

            $test= Test::where('unique',1)->first();
            Result::create([
                'request_id'=>$patientRequest->id,
                'test_id'=>$test->id,
                'value'=>$test->positive,
            ]);

        }else {
            if (isset($request->tests)) {
                foreach ($request->tests as  $test_id) {
                    Result::create([
                        'request_id'=>$patientRequest->id,
                        'test_id'=>$test_id,
                        'value'=>Test::find($test_id)->first()->positive,
                    ]);
                }
            }
            foreach ($tests_is_negative as  $test) {
                Result::create([
                    'request_id'=>$patientRequest->id,
                    'test_id'=>$test->id,
                    'value'=>$test->negative,
                ]);
            }
        }
            
        
        $patient->identityTypes()->attach(1,
        [
            'identity_type_id'=>$request->identityType_id,
            'request_id'=>$patientRequest->id,
            'identity'=>$request->identityType_number
        ]);
        return $patientRequest;
    }
    public static function printResult(PatientRequest $patientRequest,Patient $patient,$covid19=false)
    {
    
        $testsCode=$patientRequest->results->map(function ($q)  {
            return $q->test->name_en;
        });
        $testsCode= $testsCode->implode('-');
        
        $tests=Test::all();
        $qrCode= (DNS2D::getBarcodePNG(config('app.LAB_NAME')."\n".$patient->name."\n".$testsCode, 'QRCODE', 3, 3));
        $pdf = PDF::loadView('printables.print', ['patient' => $patient,'patientRequest'=> $patientRequest,'qr'=>$qrCode], [], ['format' => 'A4']);
        $fileName = str_replace('/', '-', random_int(0, 999999) . '_receipt.pdf');
        $path = public_path('/') . $fileName;
        $pdf->save($path);
        $file= public_path().'/'. $fileName;
        $headers = array(
            'Content-Type: application/pdf',
          ); 
    	return response()->file($file, $headers)->deleteFileAfterSend(true);

    }
    
}

