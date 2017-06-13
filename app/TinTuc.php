<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
  protected $table = 'TinTuc';
  public function loaitin()
  {
  	return $this->belongsTo('App\LoaiTin', 'idLoaiTin', 'id');
  }
  public function user()
  {
  	return $this->belongsTo('App\User', 'idUser', 'id');
  }
  public static function getTinNoiBat($id)
  {
  	$tinNoiBat = TinTuc::where('NoiBat', 1)->where('id', '!=', $id)->inRandomOrder()->take(4)->get();
  	return $tinNoiBat;
  }

  public static function getTinLienQuan($id)
  {
  	$tintuc = TinTuc::find($id);
  	$tinLienQuan = TinTUc::where('idLoaiTin', $tintuc->idLoaiTin)->where('id', '!=', $id)->inRandomOrder()->take(4)->get();
  	return $tinLienQuan;
  }

  public static function searchTinTuc($keyword)
  {
  	$tintuc = TinTuc::where('TieuDe', 'like', "%$keyword%")
              ->orWhere('TomTat', 'like', "%$keyword%")
              ->orWhere('NoiDung', 'like', "%$keyword%")
              // ->take(30)
              ->paginate(5);
    return $tintuc;
  }
}
