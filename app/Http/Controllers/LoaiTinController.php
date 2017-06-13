<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoaiTinRequest;
use App\Http\Requests;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
  public function getDanhSach()
  {
  	$loaitin = LoaiTin::all();
  	return view('admin.loaitin.danhsach', ['loaitin' => $loaitin]);
  }

  public function getThem()
  {
  	$theloai = TheLoai::all();
  	return view('admin.loaitin.them', ['theloai' => $theloai]);
  }

  public function postThem(LoaiTinRequest $request)
  {
  	$loaitin = new LoaiTin;
		$loaitin->Ten = $request->Ten;
		$loaitin->TenKhongDau = changeTitle($request->Ten);
		$loaitin->idTheLoai = $request->TheLoai;
		$loaitin->save();

		return redirect('admin/loaitin/them')->with('thongbao', 'Bạn đã thêm loại tin thành công');
  }

  public function getXoa($id)
  {
  	$loaitin = LoaiTin::find($id);
  	$loaitin->delete();

  	return redirect('admin/loaitin/danhsach')->with('thongbao', 'Xoá loại tin thành công');
  }

  public function getSua($id)
  {
  	$loaitin = LoaiTin::find($id);
		$theloai = TheLoai::all();
		return view('admin.loaitin.sua', ['loaitin' => $loaitin, 'theloai' => $theloai]);
  }

  public function postSua(LoaiTinRequest $request, $id) 
	{
		$loaitin = LoaiTin::find($id);
		$loaitin->Ten = $request->Ten;
		$loaitin->TenKhongDau = changeTitle($request->Ten);
		$loaitin->idTheLoai = $request->TheLoai;

		$loaitin->save();
		return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Bạn đã sửa thành công');
	}
}
