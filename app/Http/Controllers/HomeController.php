<?php namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Models\User;
use App\Models\Hostel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
    if (!User::all()->count()) {
      $hostel = Hostel::create(['name' => 'Гуртожиток', 'address' => '', 'phone' => '']);
      User::create(['name' => 'admin', 'email' => 'admin@mail.ru', 'password' => Hash::make('admin'), 'hostel_id' => $hostel->id]);
    }
	}

	public function getIndex()
	{
		return view('home');
	}

}
