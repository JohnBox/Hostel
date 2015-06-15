<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Facult;
use App\Models\Group;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Liver;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
  public function getCreateLiver()
  {
    return view('liver.create-liver', ['faculties' => Facult::all(), 'groups' => Group::all()]);
  }
  public function postCreateLiver(Request $req)
  {
    $l = Liver::create([
      'last_name' => $req->input('last_name'),
      'first_name' => $req->input('first_name'),
      'parent_name' => $req->input('parent_name'),
      'birth' => $req->input('birth'),
      'sex' => $req->input('sex'),
      'student' => $req->input('student'),
      'group_id' => $req->input('group'),
      'country' => $req->input('country') || '',
      'canton' => $req->input('canton') || '',
      'city' => $req->input('city') || '',
      'street' => $req->input('street') || '',
      'house' => $req->input('house') || '',
      'apart' => $req->input('apart') || '',
      'series' => $req->input('series') || '',
      'number' => $req->input('number') || '',
      'which' => $req->input('which'),
      'when' => $req->input('when') || '',
      'tel1' => $req->input('tel1') || '',
      'tel2' => $req->input('tel2') || '',
      'tel3' => $req->input('tel3') || ''
    ]);
    return Redirect::to('/livers/settle/'.$l->id);
  }
  public function getShowLiver($id)
  {

  }
  public function getSettle($id)
  {
    return view('liver.settle', ['rooms' => Room::all(), 'liver' => Liver::find($id)]);
  }
  public function postSettle(Request $req)
  {
    $liver = Liver::find($req->input('id'));
    $room = Room::find($req->input('room'));
    $liver->room_id = $room->id;
    $liver->save();
    $room->livers()->save($liver);
    return Redirect::to('/livers');
  }
}
