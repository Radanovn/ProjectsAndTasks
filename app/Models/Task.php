<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
     use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'status',
        'duration',
    ];
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => '-'
        ]);
    }

    public function projects()
    {
        return $this->belongsTo(Project::class);
    }

  
}
