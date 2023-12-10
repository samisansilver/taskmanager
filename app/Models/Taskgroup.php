<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taskgroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'persons',
        'archive',
    ];

    public function getJobs()
    {
        return $this->belongsToMany(Job::class, 'job_taskgroup');
    }
}
