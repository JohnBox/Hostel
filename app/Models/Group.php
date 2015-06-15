<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $fillable = ['number','course','leader','phone','facult_id'];

  public function facult()
  {
    return $this->belongsTo('App\Models\Facult');
  }

  public function livers()
  {
    return $this->hasMany('App\Models\Liver');
  }
}
