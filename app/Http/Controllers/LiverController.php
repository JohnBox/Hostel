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
  public function getNonactive()
  {
    return view('liver.nonactive', ['livers' => Liver::all()]);
  }
  public function getRemoved()
  {
    return view('liver.removed', ['livers' => Liver::all()]);
  }
  public function getCreate()
  {
    return view('liver.create', ['faculties' => Facult::all(), 'groups' => Group::all()]);
  }
  public function postCreate(Request $req)
  {
    $l = Liver::create([
      'last_name' => $req->input('last_name'),
      'first_name' => $req->input('first_name'),
      'parent_name' => $req->input('parent_name'),
      'birth' => $req->input('birth'),
      'sex' => $req->input('sex'),
      'student' => ($req->input('student') == 'on')?true:false,
      'group_id' => ($req->input('student') == 'on')?$req->input('group'):0,
      'country' => $req->input('country'),
      'canton' => $req->input('canton'),
      'city' => $req->input('city'),
      'street' => $req->input('street'),
      'house' => $req->input('house'),
      'apart' => $req->input('apart'),
      'series' => $req->input('series'),
      'number' => $req->input('number'),
      'which' => $req->input('which'),
      'when' => $req->input('when'),
      'tel1' => $req->input('tel1'),
      'tel2' => $req->input('tel2'),
      'tel3' => $req->input('tel3')
    ]);
    return Redirect::to('/livers/settle/'.$l->id);
  }
  public function getEdit($id)
  {
    return view('liver.edit', ['liver' => Liver::find($id), 'groups' => Group::all(), 'faculties' => Facult::all()]);
  }
  public function postEdit(Request $req)
  {
    $liver = Liver::find($req->input('id'));
    $liver->last_name = $req->input('last_name');
    $liver->first_name = $req->input('first_name');
    $liver->parent_name = $req->input('parent_name');
    $liver->birth = $req->input('birth');
    $liver->sex = $req->input('sex');
    $liver->student = ($req->input('student') == 'on')?true:false;
    $liver->group_id = ($req->input('student') == 'on')?$req->input('group'):0;
    $liver->country = $req->input('country');
    $liver->canton = $req->input('canton');
    $liver->city = $req->input('city');
    $liver->street = $req->input('street');
    $liver->house = $req->input('house');
    $liver->apart = $req->input('apart');
    $liver->series = $req->input('series');
    $liver->number = $req->input('number');
    $liver->which = $req->input('which');
    $liver->when = $req->input('when');
    $liver->tel1 = $req->input('tel1');
    $liver->tel2 = $req->input('tel2');
    $liver->tel3 = $req->input('tel3');
    $liver->save();
    return Redirect::to('/livers');
  }
  public function getDelete($id)
  {
    Liver::destroy($id);
    return Redirect::to('/livers');
  }
  public function getShow($id)
  {
    $liver = Liver::find($id);
    return view('liver.show', ['liver' => $liver]);
  }
  public function getSettle($id)
  {
    $liver = Liver::find($id);
    $rooms = Room::all();
    foreach ($rooms as &$room)
    {
      foreach ($room->livers as $l)
      {
        if ($l->sex != $liver->sex)
        {
          $room = null;
          break;
        }

      }

    }

    return view('liver.settle', ['rooms' => $rooms , 'liver' => $liver ]);
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
  public function getRemove($id)
  {
    $liver = Liver::find($id);
    $liver->room_id = null;
    $liver->save();
    return Redirect::to('/livers');
  }
}
