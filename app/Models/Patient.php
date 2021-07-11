<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use Filterable;
    protected $table='patients';
    protected $fillable = ['name','photo','gender','birth_date','age','nationality_id'];
    use HasFactory;
    /**
     * Get the Nationality that owns the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }
    /**
     * The identityType that belong to the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function identityTypes()
    {
        return $this->belongsToMany(IdentityType::class, 'identity_types_patient')->withPivot('identity','request_id');
    }
    public function get_identity()
    {
        $identity =$this->identityTypes()->latest()->first()->pivot->identity;
        return isset($identity)?$identity:0;
    }
    /**
     * Get all of the request for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function request()
    {
        return $this->hasMany(Request::class);
    }
    /**
     * Get all of the result for the Patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function result()
    {
        return $this->hasMany(Result::class);
    }
}
