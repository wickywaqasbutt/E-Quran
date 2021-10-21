<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
