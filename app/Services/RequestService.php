<?php
namespace App\Services;

use Carbon\Carbon;
use App\Models\Test;
use App\Models\Result;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Request as PatientRequest;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;
use Illuminate\Support\Facades\Response as FacadeResponse;

class RequestService
{

    public static function createRequest(Request $request,Patient $patient,$unique=false,$action='create')
    {

        $tests_is_negative=Test::where('selected',1)->get()->except($request->tests);
        if ($action=='create'||$unique) {
            $patientRequest= PatientRequest::create(['patient_id'=>$patient->id,'request_number'=>$request->request_number,'requesting_authority'=>$request->requesting_authority]);
        }else {
            $patientRequest=$patient->request()->latest()->first();
        }
        if ($unique) {
            $test= Test::where('unique',1)->first();
            if (isset($request->tests)) {
                 Result::updateOrCreate([
                'request_id'=>$patientRequest->id,
                'test_id'=>$test->id],
                ['value'=>$test->positive]
            );
            }else {
                 Result::updateOrCreate([
                'request_id'=>$patientRequest->id,
                'test_id'=>$test->id],
                ['value'=>$test->negative]
            );
            }

        }else {
            if (isset($request->tests)) {
                foreach ($request->tests as  $test_id) {
                    Result::updateOrCreate([
                        'request_id'=>$patientRequest->id,
                        'test_id'=>$test_id],
                        ['value'=>Test::find($test_id)->first()->positive]
                    );
                }
            }
            foreach ($tests_is_negative as  $test) {
                Result::updateOrCreate([
                    'request_id'=>$patientRequest->id,
                    'test_id'=>$test->id
                    ],
                    ['value'=>$test->negative]
                );
            }
        }

        if ($action=='create') {

            $patient->identityTypes()->attach(1,
            [
                'identity_type_id'=>$request->identity_type_id,
                'request_id'=>$patientRequest->id,
                'identity'=>$request->identityType_number,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }else {
            // dd( $patient->identityTypes());
            // $patient->identityTypes()->detach($request->identity_type_id);
            $patient->identityTypes()->sync(1,
            [
                'identity_type_id'=>$request->identity_type_id,
                'request_id'=>$patientRequest->id,
                'identity'=>$request->identityType_number,
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

        return $patientRequest;
    }

    public static function printResult(PatientRequest $patientRequest, Patient $patient, $covid19 = false) {
        // if (!$covid19) {
        $testsCode = $patientRequest->results->map(function ($q) {
            return $q->test->name_en;
        });
        $testsCode = $testsCode->implode('-');
        // }

        $latestResult = $patientRequest->results()->latest()->first();
        $x = !$covid19 ? $latestResult->value ?? $testsCode : $testsCode;

        $tests = Test::all();
        $qrCode = (DNS2D::getBarcodePNG(config('app.LAB_NAME') .
            "\n" . 'name=' . $patient->name .
            "\n" . 'nationality=' . $patient->nationality->name .
            "\n" . 'identity=' . $patient->identityTypes()->where('request_id', $patientRequest->id)->first()->name .
            "\n" . 'identity number=' . $patient->identityTypes()->where('request_id', $patientRequest->id)->first()->pivot->identity .
            "\n" . 'created at=' . $patientRequest->created_at->format('Y-m-d') .
            "\n" . $x,
            'QRCODE', 3, 3));
        $pdf = PDF::loadView('printables.print', ['patient' => $patient, 'patientRequest' => $patientRequest, 'qr' => $qrCode], [], ['format' => 'A4']);
        $fileName = str_replace('/', '-', random_int(0, 999999) . '_receipt.pdf');
        $path = public_path('/') . $fileName;
        $pdf->save($path);
        $file = public_path() . '/' . $fileName;
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->file($file, $headers)->deleteFileAfterSend(true);

    }

}

