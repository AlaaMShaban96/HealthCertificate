<?php

namespace App\Models;

use App\Models\Log;
use App\Models\Branch;
use App\Models\Result;
use App\Models\Patient;
use App\Models\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'phone',
        'role',
        'branch_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function logs()
    {
        return $this->hasMany(Log::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
