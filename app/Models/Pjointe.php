<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pjointe extends Model
{
    use HasFactory;

    protected $fillable = [
        'pjointe_code',
        'request_code',
        'label',
        'file',
    ];
}
?>
