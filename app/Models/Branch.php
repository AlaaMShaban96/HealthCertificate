<?php

namespace App\Models;

use App\Models\User;
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
}
