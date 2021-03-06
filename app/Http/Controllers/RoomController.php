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
    foreach ($rooms as &$r)
    {
      foreach ($r->livers as &$l) {
        $l->first_name = mb_substr($l->first_name,0,1).'.';
        $l->parent_name = mb_substr($l->parent_name,0,1).'.';
      }

    }


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
