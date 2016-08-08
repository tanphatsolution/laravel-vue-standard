<?php

use Illuminate\Database\Seeder;
use App\Eloquent\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
		$user->name = 'Hệ thống';
		$user->username = 'nobody';
		$user->email = 'nobody@system.com';
		$user->password = bcrypt('nobody@gos+');
		$user->save();

		$user = new User();
		$user->name = 'Quản trị';
		$user->username = 'admin';
		$user->email = 'admin@admin.com';
		$user->password = bcrypt('admin@gos');
		$user->save();
    }
}
