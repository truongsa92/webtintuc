<?php

use Illuminate\Database\Seeder;

class TinTuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('TinTuc')->insert([
    		['idLoaiTin'=>'1','TieuDe' => 'Tieu De1 ','TieuDeKhongDau' => 'tieu-de-1','TomTat' => '1','NoiDung' => '11','Hinh' => 'test1.jpg','NoiBat' => 1, 'idUser' => 1],
    		['idLoaiTin'=>'1','TieuDe' => 'Tieu De 2','TieuDeKhongDau' => 'tieu-de-2','TomTat' => '2','NoiDung' => '22','Hinh' => 'test2.jpg','NoiBat' => 1, 'idUser' => 1],
    		['idLoaiTin'=>'1','TieuDe' => 'Tieu De 3','TieuDeKhongDau' => 'tieu-de-3','TomTat' => '3','NoiDung' => '33','Hinh' => 'test3.jpg','NoiBat' => 1, 'idUser' => 1],
    		['idLoaiTin'=>'1','TieuDe' => 'Tieu De 4','TieuDeKhongDau' => 'tieu-de-4','TomTat' => '4','NoiDung' => '44','Hinh' => 'test4.jpg','NoiBat' => 1, 'idUser' => 1],
    		['idLoaiTin'=>'2','TieuDe' => 'Tieu De 5','TieuDeKhongDau' => 'tieu-de-5','TomTat' => '5','NoiDung' => '55','Hinh' => 'test5.jpg','NoiBat' => 1, 'idUser' => 1],
    		['idLoaiTin'=>'2','TieuDe' => 'Tieu De 6','TieuDeKhongDau' => 'tieu-de-6','TomTat' => '6','NoiDung' => '66','Hinh' => 'test6.jpg','NoiBat' => 1, 'idUser' => 1],
    		['idLoaiTin'=>'3','TieuDe' => 'Tieu De 7','TieuDeKhongDau' => 'tieu-de-7','TomTat' => '7','NoiDung' => '77','Hinh' => 'test7.jpg','NoiBat' => 0, 'idUser' => 2],
    		['idLoaiTin'=>'3','TieuDe' => 'Tieu De 8','TieuDeKhongDau' => 'tieu-de-8','TomTat' => '8','NoiDung' => '88','Hinh' => 'test8.jpg','NoiBat' => 0, 'idUser' => 1],
    		['idLoaiTin'=>'3','TieuDe' => 'Tieu De 9','TieuDeKhongDau' => 'tieu-de-9','TomTat' => '9','NoiDung' => '99','Hinh' => 'test9.jpg','NoiBat' => 0, 'idUser' => 1],
    		['idLoaiTin'=>'4','TieuDe' => 'Tieu De 10','TieuDeKhongDau' => 'tieu-de-10','TomTat' => '10','NoiDung' => '1010','Hinh' => 'test10.jpg','NoiBat' => 0, 'idUser' => 1],
    		['idLoaiTin'=>'4','TieuDe' => 'Tieu De 11','TieuDeKhongDau' => 'tieu-de-11','TomTat' => '11','NoiDung' => '1111','Hinh' => 'test11.jpg','NoiBat' => 0, 'idUser' => 1],
    		['idLoaiTin'=>'4','TieuDe' => 'Tieu De 12','TieuDeKhongDau' => 'tieu-de-12','TomTat' => '12','NoiDung' => '1212','Hinh' => 'test12.jpg','NoiBat' => 0, 'idUser' => 1],
    		['idLoaiTin'=>'4','TieuDe' => 'Tieu De 13','TieuDeKhongDau' => 'tieu-de-13','TomTat' => '13','NoiDung' => '1313','Hinh' => 'test13.jpg','NoiBat' => 0, 'idUser' => 2]
    	]);
    }
}
