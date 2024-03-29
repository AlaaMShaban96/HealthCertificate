<?php

namespace App\Models;

use App\Models\User;
use App\Models\IdentityType;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use Filterable;
    protected $table='patients';
    protected $appends = ['identity','IdentityTypeId','RequestingAuthority','RequestNumber','LastResults'];
    protected $fillable = ['name','photo','gender','birth_date','age','nationality_id','branch_id','user_id'];
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
        return $this->belongsToMany(IdentityType::class, 'identity_types_patient','patient_id','identity_type_id')->withPivot('identity','request_id');
    }
    public function getIdentityAttribute()
    {
        $identity =$this->identityTypes()->latest()->first();
        return isset($identity)?$identity->pivot->identity:0;
    }
    public function getIdentityTypeIdAttribute()
    {
        $identity =$this->identityTypes()->latest()->first();
        return isset($identity)?$identity->pivot->identity_type_id:0;
    }
    public function getRequestingAuthorityAttribute()
    {
        $requesting_authority =$this->request()->latest()->first();
        return isset($requesting_authority)?$requesting_authority->requesting_authority:'لا يوجد';
    }
    public function getRequestNumberAttribute()
    {
        $request_number =$this->request()->latest()->first();
        return isset($request_number)?$request_number->request_number:'';
    }
    public function getLastResultsAttribute()
    {
        $last =$this->request()->latest()->first();
        return isset($last)?$last->results:'';
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
