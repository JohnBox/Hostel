<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Liver;

class LiverController extends Controller {

  public function __construct()
  {
    $this->middleware('auth');
  }

	public function getIndex()
	{
		return view('liver.index', ['livers' => Liver::all()]);
	}
  public function getActive()
  {
    return view('liver.active', ['livers' => Liver::all()]);
  }
  public function getDeactive()
  {
    return view('liver.deactive', ['livers' => Liver::all()]);
  }
  public function getShow($id)
  {
    return view('room.show', ['room' => Room::find($id)]);
  }

}
