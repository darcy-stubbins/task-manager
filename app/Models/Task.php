<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'content', 
        'delegator_id',
        'delegate_id',
        'deadline', 
        'status_id', 
    ]; 

    public function delegate()
    {
        return $this->belongsTo(User::class, 'delegate_id'); 
    }

    public function delegator()
    {
        return $this->belongsTo(User::class, 'delegator_id'); 
    }

    public function status()
    {
        return $this->belongsTo(Status::class); 
    }
}
