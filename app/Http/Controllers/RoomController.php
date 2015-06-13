<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller {

  public function getIndex()
  {
    return view('room.index', ['rooms' => Room::where('hostel_id','=',Auth::user()->hostel->id)->get()]);
  }
}
