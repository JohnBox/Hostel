<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoomController extends Controller
{

  public function getIndex()
  {
    $rooms = Room::where('hostel_id', '=', Auth::user()->hostel->id)->get();
    return view('room.index', ['rooms' => $rooms]);
  }

  public function getShow($id)
  {
    return view('room.show', ['room' => Room::find($id)]);
  }
  public function getSettle($id)
  {

  }
  public function getDeleteLiver($id)
  {

  }
}
