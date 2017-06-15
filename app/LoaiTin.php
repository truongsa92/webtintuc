<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
  protected $table = 'LoaiTin';
  public function theloai()
  {
  	return $this->belongsTo('App\TheLoai', 'idTheLoai', 'id');
  }

  public function tintuc()
  {
  	return $this->hasMany('App\TinTuc', 'idLoaiTin', 'id');
  }

  public static function saveLoaiTin($request)
  {
  	$loaitin = new LoaiTin;
    $loaitin->Ten = $request->Ten;
    $loaitin->TenKhongDau = changeTitle($request->Ten);
    $loaitin->idTheLoai = $request->TheLoai;
    $loaitin->save();
  }

  public static function updateLoaiTin($request, $id)
  {
  	$loaitin = LoaiTin::find($id);
    $loaitin->Ten = $request->Ten;
    $loaitin->TenKhongDau = changeTitle($request->Ten);
    $loaitin->idTheLoai = $request->TheLoai;
    $loaitin->save();
  }

  public static function deleteLoaiTin($id)
  {
  	$loaitin = LoaiTin::find($id);
    $loaitin->delete();
  }
}

