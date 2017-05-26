<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([ 
      	[
      		'name' => 'admin',
          	'email' => 'admin@admin.admin',
          	'password' => bcrypt('123456'),
          	'levle'=> 2,
          	'created_at' => new DateTime(),
      	],
      	[
      		'name' => 'member',
          	'email' => 'member@member.member',
          	'password' => bcrypt('123456'),
          	'levle'=> 0,
          	'created_at' => new DateTime(),
      	]
    	]);
    }
}
