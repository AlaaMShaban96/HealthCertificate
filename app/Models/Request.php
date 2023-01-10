<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    protected $table='requests';
    protected $fillable = ['patient_id','request_number','requesting_authority','unique','branch_id'];
    use HasFactory;
    /**
     * Get the patient that owns the Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    /**
     * Get all of the results for the Request
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


}
