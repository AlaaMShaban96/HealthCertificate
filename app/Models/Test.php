<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    const UNIQUE = true;
    protected $table='tests';
           protected $fillable = ['name_ar','name_en','positive','negative','selected','unique'];
    use HasFactory;
    /**
     * Get all of the request for the Test
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function request()
    {
        return $this->hasMany(Request::class);
    }
}
