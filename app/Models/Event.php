<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable=[
    'title',
    'contents',
    'image',
    'user_id'
        ];
        
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
