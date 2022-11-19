<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'title',
        'contents',
        'image',
        ];
        
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'ASC')->paginate($limit_count);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
