<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Passport extends Model
{
    
    protected $table = 'passports';

    protected $fillable = [
        'country_code', 'type', 'passpost_no', 'passposrt_image','issue_date', 'expiration_date', 'user_id',
    ];

    public function users()
    {
         return $this->belongsTo(User::class);
    }
}
