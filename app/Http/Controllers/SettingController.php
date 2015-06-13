<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Hostel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller {

  public function __construct() {
    $this->middleware('auth');
    if (Auth::user()->name != 'admin')
    {
      Redirect::to('/');
    }
  }

	public function getIndex()
	{
		return view('setting.index', [
      'hostels' => Hostel::all(),
      'users' => User::all(),
      'rooms' => Room::all(),
    ]);
	}

	public function postCreateRooms(Request $req)
	{
    $room_count = $req->input('room_count');
    for ($i=1;$i<=$room_count;$i++)
    {
      Room::create([
        'number' => $i,
        'liver_count' => 0,
        'liver_max' => $req->input('liver_max'),
        'block' => 0,
        'area' => $req->input('area'),
        'hostel_id' => $req->user()->hostel->id
      ]);
    }
    return Redirect::to('/settings');
	}
  public function getDeleteRooms()
  {
    Room::truncate();
    return Redirect::to('/settings');
  }
  public function getEditRoom($id)
  {
    return view('setting.edit-room', ['room' => Room::find($id)]);
  }
  public function postEditRoom(Request $req)
  {
    $room = Room::find($req->input('id'));
    $room->number = $req->input('number');
    $room->liver_max = $req->input('liver_max');
    $room->block = $req->input('block');
    $room->area = $req->input('area');
    $room->save();
    return Redirect::to('/settings');
  }
  public function getDeleteRoom($id)
  {
    Room::destroy($id);
    return Redirect::to('/settings');
  }
}
