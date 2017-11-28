<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert(
			[
				'first_name' => 'Ghazanfar',
				'last_name' => 'Rehman',
				'username' => 'Admin',
				'date_of_birth' => '1993-02-15',
				'type' => 'admin',
				'phone' => '+923007227332',
				'created_by' => 'admin',
				'verify' => 1,
				'email' => 'admin@gmail.com',
				'password' => bcrypt('123456'),
				'address' => '',
				'postalcode' => '',
				'total_members' => '',
				'total_price' => '',
				'membership_number' => '',
				'expiration_date' => '1993-02-15',
				'profile_image' => '',
				'verifytoken' => '',
				'status' => 1,
			]);
		DB::table('users')->insert(
			[
				'first_name' => 'Super',
				'last_name' => 'User',
				'username' => 'superUser',
				'date_of_birth' => '1993-02-15',
				'type' => 'superuser',
				'phone' => '+923007227332',
				'created_by' => 1,
				'verify' => 1,
				'email' => 'superuser@gmail.com',
				'password' => bcrypt('123456'),
				'address' => '',
				'postalcode' => '',
				'total_members' => '',
				'total_price' => '',
				'membership_number' => '',
				'expiration_date' => '1993-02-15',
				'profile_image' => '',
				'verifytoken' => '',
				'status' => 1,
			]);
		DB::table('users')->insert(
			[
				'first_name' => 'Sub',
				'last_name' => 'User',
				'username' => 'SubUser',
				'date_of_birth' => '1993-02-15',
				'type' => 'subuser',
				'phone' => '+923007227332',
				'created_by' => 1,
				'verify' => 1,
				'email' => 'subuser@gmail.com',
				'password' => bcrypt('123456'),
				'address' => '',
				'postalcode' => '',
				'total_members' => '',
				'total_price' => '',
				'membership_number' => '',
				'expiration_date' => '1993-02-15',
				'profile_image' => '',
				'verifytoken' => '',
				'status' => 1,
			]
		);
	}
}
