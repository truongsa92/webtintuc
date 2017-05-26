<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(Users::class);
    	$this->call(TheLoai::class);
    	$this->call(LoaiTin::class);
    	$this->call(TinTuc::class);
    }
}
