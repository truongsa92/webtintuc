<?php

use Illuminate\Database\Seeder;

class TheLoai extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('TheLoai')->insert([
      	['Ten' => 'Bóng Đá','TenKhongDau' => 'bong-da'],
      	['Ten' => 'Thế Giới','TenKhongDau' => 'the-gioi'],
      	['Ten' => 'Thời Trang Hi-teach','TenKhongDau' => 'thoi-trang'],
      	['Ten' => 'An Ninh Xã Hội','TenKhongDau' => 'an-ninh-xa-hoi'],
      	['Ten' => 'Tin Tức Phụ nữ','TenKhongDau' => 'tin-tuc-phu-nu'],
      	['Ten' => 'Ẩm thực','TenKhongDau' => 'am-thuc'],
      	['Ten' => 'Làm Đẹp','TenKhongDau' => 'lam-dep'],
      	['Ten' => 'Tin Tức Quốc Tế','TenKhongDau' => 'tin-tuc-quoc-te'],
      	['Ten' => 'Tin Tức Trong Ngày','TenKhongDau' => 'tin-tuc-trong-ngay']
    	]);
    }
}
