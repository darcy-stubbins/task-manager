<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id', 
        'content', 
        'user_id', 
    ]; 

    public function task()
    {
        return $this->belongsTo(Task::class); 
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class); 
    }

    public function childComments()
    {
        return $this->hasMany(Comment::class); 
    }
}
