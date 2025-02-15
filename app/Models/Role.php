<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $primaryKey = 'role_code';
    public $incrementing = false;

    protected $fillable = [
        'role_code',
        'label',
        'description',
    ];

    public $timestamps = false;
}
