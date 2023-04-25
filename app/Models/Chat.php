<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Chat extends Model
{
    
    use HasFactory;
    protected $fillable = [
    'message',
    'uidentifer',
    'user_id',
    ];
    
    
    
    public function getByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'ASC')->limit($limit_count)->get();
        
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    
}
