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
        'archive'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
