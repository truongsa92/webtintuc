<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoaiTinRequest;
use App\Http\Requests;
use App\LoaiTin;
use App\TheLoai;

class LoaiTinController extends Controller
{
  public function index()
  {
    $loaitin = LoaiTin::all();
    return view('admin.loaitin.danhsach', ['loaitin' => $loaitin]);
  }

  public function create()
  {
    $theloai = TheLoai::all();
    return view('admin.loaitin.them', ['theloai' => $theloai]);
  }

  public function store(LoaiTinRequest $request)
  {
    LoaiTin::saveLoaiTin($request);
    return redirect()->route('admin.loaitin.create')->with('thongbao', 'Bạn đã thêm loại tin thành công');
  }

  public function edit($id)
  {
    $loaitin = LoaiTin::find($id);
    $theloai = TheLoai::all();
    return view('admin.loaitin.sua', ['loaitin' => $loaitin, 'theloai' => $theloai]);
  }

  public function update(LoaiTinRequest $request, $id)
  {
    LoaiTin::updateLoaiTin($request, $id);
    return redirect()->route('admin.loaitin.edit', [$id])->with('thongbao', 'Bạn đã sửa thành công');
  }
  public function destroy($id)
  {
    LoaiTin::deleteLoaiTin($id);
    return redirect()->route('admin.loaitin.index')->with('thongbao', 'Xoá loại tin thành công');
  }
}
