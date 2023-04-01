<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'author', 'year'
  ];

  public function authors()
  {
    return $this->belongsTo('App\Authors', 'author');
  }
}

