<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Patient;
use App\Models\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    protected $table='branches';
    protected $fillable = ['name','active'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    public function getRequestCountPerMonth()
    {
        $requests= $this->requests()->select('id', 'created_at')
        ->whereYear('created_at', '=', date("Y"))
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('m');
        });
        $requestscount = [];
        $result = [];
        foreach ($requests as $key => $value) {
            $requestscount[(int)$key] = count($value);
        }
        for ($i = 1; $i <= 12; $i++) {
            if (!empty($requestscount[$i])) {
                $result[$i] = $requestscount[$i];
            } else {
                $result[$i] = 0;
            }
            // $result[$i]['month'] = $month[$i - 1];
        }
    
        return $result;
    }
}
