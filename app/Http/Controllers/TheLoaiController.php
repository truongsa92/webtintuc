<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TheLoaiRequest;
use App\Http\Requests;
use App\TheLoai;

class TheLoaiController extends Controller
{
  public function getThem()
  {
  	return view('admin.theloai.them');
  }

  public function postThem(TheLoaiRequest $request)
  {
  	$theloai = new TheLoai;
  	$theloai->Ten = $request->ten;
  	$theloai->TenKhongDau = changeTitle($request->ten);
  	$theloai->save();

  	return redirect('admin/theloai/them')->with('thongbao', 'Thêm thành công thể loại!');
  }

  public function getDanhSach()
  {
  	$theloai = TheLoai::all();
  	return view('admin/theloai/danhsach', ['theloai' => $theloai]);
  }

  public function getXoa($id)
  {
  	$theloai = TheLoai::find($id);
  	$theloai->delete();

  	return redirect('admin/theloai/danhsach')->with('thongbao', 'Xoá thành công thể loại!');
  }

  public function getSua($id)
  {
  	$theloai = TheLoai::find($id);
  	return view('admin.theloai.sua', ['theloai' => $theloai]);
  }

  public function postSua(TheLoaiRequest $request, $id)
  {
  	$theloai = TheLoai::find($id);
  	$theloai->Ten = $request->ten;
  	$theloai->TenKhongDau = changeTitle($request->ten);
  	$theloai->save();

  	return redirect('admin/theloai/sua/'.$id)->with('thongbao', 'Sửa thành công thể loại');
  }
}
