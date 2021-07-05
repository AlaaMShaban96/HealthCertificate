<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Patient::class, 'identity_types_patient')->withPivot('identity','request_id');
    }
}
