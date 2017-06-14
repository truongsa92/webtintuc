<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TheLoaiRequest;
use App\Http\Requests;
use App\TheLoai;

class TheLoaiController extends Controller
{
  public function index()
  {
    $theloai = TheLoai::all();
    return view('admin/theloai/danhsach', ['theloai' => $theloai]);
  }

  public function create()
  {
    return view('admin.theloai.them');
  }

  public function store(TheLoaiRequest $request)
  {
    $theloai = new TheLoai;
    $theloai->Ten = $request->ten;
    $theloai->TenKhongDau = changeTitle($request->ten);
    $theloai->save();

    return redirect()->route('admin.theloai.create')->with('thongbao', 'Thêm thành công thể loại!');
  }

  public function edit($id)
  {
    $theloai = TheLoai::find($id);
    return view('admin.theloai.sua', ['theloai' => $theloai]);
  }

  public function update(TheLoaiRequest $request, $id)
  {
    $theloai = TheLoai::find($id);
    $theloai->Ten = $request->ten;
    $theloai->TenKhongDau = changeTitle($request->ten);
    $theloai->save();

    return redirect()->route('admin.theloai.edit', [$id])->with('thongbao', 'Sửa thành công thể loại');
  }
  
  public function destroy($id)
  {
  	$theloai = TheLoai::find($id);
  	$theloai->delete();

  	return redirect()->route('admin.theloai.index')->with('thongbao', 'Xoá thành công thể loại!');
  }
}
