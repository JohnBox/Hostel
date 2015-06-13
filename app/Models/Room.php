<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model {

	protected $fillable = ['number','liver_count','liver_max','block','area','hostel_id'];

  public $timestamps = false;

  public function hostel()
  {
    return $this->belongsTo('App\Models\Hostel');
  }

  public function livers()
  {
    return $this->hasMany('App\Models\Liver');
  }

}
