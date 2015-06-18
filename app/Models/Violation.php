<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{

  protected $fillable = ['liver_id', 'description', 'penalty', 'date', 'paid'];

  public $timestamps = false;

  public function liver()
  {
    return $this->belongsTo('App\Models\Liver');
  }

}
