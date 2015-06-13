<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facult extends Model {

	protected $fillable = ['name','short_name','years'];

  public $timestamps = false;

  public function groups()
  {
    return $this->hasMany('App\Models\Group');
  }
}
