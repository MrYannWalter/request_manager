<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'request_id',
        'sender_type',
        'sender_id',
    ];

    public function request()
    {
        return $this->belongsTo(RequestModel::class); // ajustez le nom du modèle si différent
    }

    public function sender()
    {
        return $this->morphTo();
    }
}
