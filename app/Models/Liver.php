<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liver extends Model
{

  protected $fillable = [
    'last_name', 'first_name', 'parent_name',
    'birth', 'sex',
    'student', 'group_id',
    'country', 'canton', 'city', 'street', 'house', 'apart',
    'series', 'number', 'which', 'when',
    'tel1', 'tel2', 'tel3',
    'room_id', 'balance',
    'active',
    'live_in', 'live_out'
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

  public function violations()
  {
    return $this->hasMany('App\Models\Violation');
  }
  public function pays()
  {
    return $this->hasMany('App\Models\Pay');
  }
  public function scopeActive($query)
  {
    return $query->where('active','=',true)->get();
  }
  public function scopeNonactive($query)
  {
    return $query->where('active','=',null)->get();
  }
  public function scopeRemoved($query)
  {
    return $query->where('active','=',false)->get();
  }


}
