<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'firstName', 'lastName'
  ];

  public function books()
  {
    return $this->hasMany('App\Books');
  }
}
