<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nationality extends Model
{
    protected $table='nationalities';
    protected $fillable = ['name'];
    use HasFactory;
    /**
     * Get all of the patient for the Nationality
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function patient()
    {
        return $this->hasMany(Patient::class);
    }
}
