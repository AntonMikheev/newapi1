<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        $this->call('UserTableSeeder');

        $this->command->info('Таблица пользователей загружена данными!');
    }

}
class UserTableSeeder extends Seeder {
	public function run()
	{
		Eloquent::unguard();
//        $this->call('UserTableSeeder');

		// $this->call('UserTableSeeder');

        DB::table('users')->delete();

        User::create(array('name'=>'Tom', 'email' => '1', 'password' => Hash::make('1')));
        User::create(array('name'=>'Vasya', 'email' => '2', 'password' => Hash::make('2')));
        User::create(array('name'=>'Admin', 'email' => 'admin', 'password' => Hash::make('admin')));
	}


}