<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'status',
        'duration',
        'client',
        'company',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }
  
    public function status()
    {
        return $this->belongsTo(ProjectStatus::class);
    }
}
