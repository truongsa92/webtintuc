<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Cache;

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
              ->paginate(5);
    return $tintuc;
  }
  public static function getTinTuc()
  {
    $tintuc = TinTuc::paginate(10);
    return $tintuc;
  }

  public static function saveTinTuc($request)
  {
    $tintuc = new TinTuc;
    $tintuc->TieuDe = $request->TieuDe;
    $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    $tintuc->TomTat = $request->TomTat;
    $tintuc->NoiDung = $request->NoiDung;
    $tintuc->NoiBat = $request->NoiBat;

    if($request->hasFile('HinhAnh')) {
      $file = $request->file('HinhAnh');
      $name = $file->getClientOriginalName();

      $ext = $file->getClientOriginalExtension();

      if (file_exists('upload/tintuc')) {
        $file->move('upload/tintuc', $name);
      }
      $tintuc->Hinh = $name;
    } else {
      $tintuc->Hinh = "";
    }
    $tintuc->idLoaiTin = $request->LoaiTin;
    $tintuc->idUser = Auth::user()->id;;
    $tintuc->save();
  }

  public static function updateTinTuc($request, $id)
  {
    $tintuc = TinTuc::find($id);
    $tintuc->TieuDe = $request->TieuDe;
    $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
    $tintuc->TomTat = $request->TomTat;
    $tintuc->NoiDung = $request->NoiDung;
    $tintuc->NoiBat = $request->NoiBat;

    if($request->hasFile('HinhAnh')) {
      $file = $request->file('HinhAnh');
      $name = $file->getClientOriginalName();
      
      //Xoá ảnh cũ 
      @unlink('upload/tintuc/'.$tintuc->Hinh);

      $ext = $file->getClientOriginalExtension();
      if (file_exists('upload/tintuc')) {
        $file->move('upload/tintuc', $name);
      }
      $tintuc->Hinh = $name;
    } 
    $tintuc->idLoaiTin = $request->LoaiTin;
    $tintuc->save();
  }

  public static function deleteTinTuc($id)
  {
    $tintuc = TinTuc::find($id);
    $tintuc->delete();
    //Xoá ảnh
    @unlink('upload/tintuc/'.$tintuc->Hinh);
  }

  public static function getTinTucByIdLoaiTin($id)
  {
    $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(5);
    return $tintuc;
  }

  public static function fetAll()
  {
    $result = Cache::remember('new_cache', 1, function ()
    {
      return TinTuc::alL();
    });
    return $result;
  }

}






