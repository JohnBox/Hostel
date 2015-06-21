<?php namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Models\Liver;
use App\Models\Pay;
use App\Models\User;
use App\Models\Hostel;
use App\Models\Violation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
    if (!User::all()->count()) {
      $hostel = Hostel::create(['name' => 'Гуртожиток', 'address' => '', 'phone' => '','area' => 2000]);
      User::create(['name' => 'admin', 'email' => 'admin@mail.ru', 'password' => Hash::make('admin'), 'hostel_id' => $hostel->id]);
    }
	}

	public function getIndex()
	{
    $pays = $pays = DB::table('pays')->select(DB::raw('SUM(live_price) as live_price,
     SUM(gas_price) as gas_price,
     SUM(elec_price) as elec_price,
     SUM(water_price) as water_price,
     SUM(total) as total,
     SUM(paid) as paid,
     date'))->groupBy('date')->get();
		return view('home', [
      'violations' => Violation::all()->take(10),
      'livers' => Liver::all()->take(10),
      'pays' => $pays
    ]);
	}

}
