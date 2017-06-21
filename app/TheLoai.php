<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
  protected $table = 'TheLoai';

  public function loaitin()
  {
  	return $this->hasMany('App\LoaiTin', 'idTheLoai', 'id');
  }

  public function tintuc()
  {
  	return $this->hasManyThrough('App\TinTuc', 'App\LoaiTin', 'idTheLoai', 'idLoaiTin', 'id');
  }

  public static function saveTheLoai($request)
  {
  	$theloai = new TheLoai;
    $theloai->Ten = $request->ten;
    $theloai->TenKhongDau = changeTitle($request->ten);
    $theloai->save();
  }

  public static function updateTheLoai($request, $id)
  {
  	$theloai = TheLoai::find($id);
    $theloai->Ten = $request->ten;
    $theloai->TenKhongDau = changeTitle($request->ten);
    $theloai->save();
  }

  public static function deleteTheLoai($id)
  {
  	$theloai = TheLoai::find($id);
  	$theloai->delete();
  }

  public static function convertToArrayTypeKeyValueTheLoai($allTheLoai)
  { 
    $theloai = [];
    foreach ($allTheLoai as $key => $value) {
      $theloai[$value->id] = $value->Ten;
    }
    return $theloai;
  }
}
