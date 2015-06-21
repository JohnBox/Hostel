<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Liver;
use Illuminate\Http\Request;

class ReportController extends Controller {

  public function getIndex()
  {
    $livers = Liver::where('balance','<','0.0')->get();
    $total = 0;
    foreach ($livers as $l) {
      $total+=$l->balance;
    }

    return view('report.index', ['livers' => $livers, 'total' => (float)$total]);
  }
}
