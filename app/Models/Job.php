<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
        'process',
        'archive',
        'force'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTaskGroups()
    {
        return $this->belongsToMany(Taskgroup::class, 'job_taskgroup');
    }

}
