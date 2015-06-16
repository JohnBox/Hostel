<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liver extends Model {

	protected $fillable = [
    'last_name','first_name','parent_name',
    'birth','sex',
    'student','group_id',
    'country','canton','city','street','house','apart',
    'series','number','which','when',
    'tel1','tel2','tel3',
    'room_id','balance'
  ];

  public $timestamps = false;

  public function group()
  {
    return $this->belongsTo('App\Models\Group');
  }

  public function room()
  {
    return $this->belongsTo('App\Models\Room');
  }

  public function scopeSex($query)
  {
  }

}
