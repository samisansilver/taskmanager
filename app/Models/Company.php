<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
      'person',
      'company',
      'phone',
      'mobile',
      'address',
      'chap',
      'gifts',
      'adsmanager',
      'tablosardarb',
      'decor',
      'stand',
      'adsagency',
      'cip',
      'bastebandi',
      'graphist',
      'freelancer',
      'narator',
      'exhibition',
      'age',
      'city',
      'site',
      'email',
      'quality',
      'codeeghtesadi',
      'shenasemelli',
      'shenasesabt',
      'codekargah',
      'codesabtashkhas',
      'user_id',
    ];

    use HasFactory;

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }
}
