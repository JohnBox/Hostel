<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facult;
use App\Models\Group;
use App\Models\Liver;
use App\Models\Room;
use App\Models\Violation;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 $this->call('UserTableSeeder');
	}

}

class UserTableSeeder extends Seeder {
  public function run()
  {
    Facult::create([
      'name' => 'Розробка програмного забезпечення',
      'short_name' => 'П',
      'years' => 4
    ]);
    Facult::create([
      'name' => 'Інженерна та комп’ютерна графіка',
      'short_name' => 'Г',
      'years' => 3
    ]);
    Group::create([
      'facult_id' => 1,
      'course' => 4,
      'number' => 13,
      'leader' => 'Коржановська Л.М.',
      'phone' => '2-34-56'
    ]);
    Group::create([
      'facult_id' => 2,
      'course' => 3,
      'number' => 10,
      'leader' => 'Лисюк В.В.',
      'phone' => '6-54-32'
    ]);
    for ($i=0;$i<10;$i++)
    {
      Room::create([
        'hostel_id' => 1,
        'number' => $i+1,
        'liver_max' => 5,
        'block' => 0,
        'area' => 20.0,
      ]);
    }
    Liver::create([
      'last_name' => 'Гонта',
      'first_name' => 'Григорій',
      'parent_name' => 'Євгенійович',
      'birth' => '1995-12-24',
      'sex' => 1,
      'student' => true,
      'group_id' => 1,
      'balance' => 0,
      'room_id' => 1,
      'active' => true,
      'live_in' => date('Y-m-d')
    ]);
    Liver::create([
      'last_name' => 'Гончарук',
      'first_name' => 'Олександра',
      'parent_name' => 'Олегівна',
      'birth' => '1995-12-09',
      'sex' => 0,
      'student' => true,
      'group_id' => 2,
      'balance' => 0,
      'room_id' => 1,
      'active' => true,
      'live_in' => date('Y-m-d')
    ]);
    Liver::create([
      'last_name' => 'Степанчук',
      'first_name' => 'В’ячеслав',
      'parent_name' => 'Миколайович',
      'birth' => '1995-11-11',
      'sex' => 1,
      'student' => false,
      'group_id' => 0,
      'balance' => 0,
      'room_id' => 1,
      'active' => null
    ]);
  }
}
