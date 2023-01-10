<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Log extends Model
{
    protected $table='logs';
    protected $fillable = ['user_id','action','massage'];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
