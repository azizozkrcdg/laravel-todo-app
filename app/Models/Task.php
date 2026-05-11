<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ["task_title", "user_id", "task_content", "task_date", "task_status", "completed_title", "completed_content", "completed_date"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
