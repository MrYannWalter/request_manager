<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;


protected $fillable = [
    'request_title',
    'request_description',
    'priority',
    'category_id',
    'user_id',
    'attachment_path',
    'status',
    'submitted_at',
    'agent_id', // <-- il doit être ici aussi !
];


    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
public function responses()
{
    return $this->hasMany(Response::class, 'request_id');
}

}
