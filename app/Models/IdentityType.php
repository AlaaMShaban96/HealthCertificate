<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IdentityType extends Model
{
    protected $table='identity_types';
    protected $fillable = ['name','identity'];
    use HasFactory;
    /**
     * The patient that belong to the IdentityType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'identity_types_patient','identity_type_id','patient_id')->withPivot('identity','request_id');
    }
}
