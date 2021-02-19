<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    

  protected $table = 'travels';

  protected $fillable = [
     'purpose_of_visit', 'length_of_stay', 'port_of_stay','last_port_of_stay','user_id',
  ];


  public function users()
  {
       return $this->belongsTo(User::class);
  }

}
