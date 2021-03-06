<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Liver;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ViolationController extends Controller {

  public function getIndex()
  {
    $violations = Violation::all();
    foreach ($violations as &$v)
    {
      $v->date = implode('.', array_reverse(explode('-',$v->date)));
    }
    return view('violation.index', ['violations' => $violations]);
  }

  public function getCreate()
  {
    return view('violation.create',['livers' => Liver::all()]);
  }
  public function postCreate(Request $req)
  {
    $count = count($req->input('livers'));
    $penalty = (float)$req->input('penalty')/$count;
    foreach ($req->input('livers') as $l)
    {
      $liver = Liver::find($l);
      $liver->balance -= $penalty;
      $liver->save();
      Violation::create([
        'liver_id' => $liver->id,
        'description' => $req->input('description'),
        'date' => date("Y-m-d", strtotime($req->input('date'))),
        'penalty' => $penalty,
        'paid' => false
      ]);
    }
    return Redirect::to('/violations');
  }
  public function getEdit($id)
  {
    $v = Violation::find($id);
    $v->date = implode('.', array_reverse(explode('-',$v->date)));
    return view('violation.edit', ['violation' => $v]);
  }
  public function postEdit(Request $req)
  {
    $violation = Violation::find($req->input('id'));
    $liver = Liver::find($violation->liver->id);
    $liver->balance += ($violation->penalty-$req->input('penalty'));
    $liver->save();
    $violation->liver_id = $liver->id;
    $violation->description = $req->input('description');
    $violation->date = date("Y-m-d", strtotime($req->input('date')));
    $violation->penalty = $req->input('penalty');
    $violation->save();
    return Redirect::to('/violations');
  }
  public function getDelete($id)
  {
    Violation::destroy($id);
    return Redirect::to('/violations');
  }
  public function getPaid($id)
  {
    $v = Violation::find($id);
    $l = Liver::find($v->liver_id);
    $l->balance += $v->penalty;
    $l->save();
    $v->paid = true;
    $v->save();
    return Redirect::to('/violations');
  }
}
