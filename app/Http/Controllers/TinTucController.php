<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TinTucRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;

class TinTucController extends Controller
{
	public function index()
	{
		$tintuc = TinTuc::getTinTuc();
  	return view('admin.tintuc.danhsach', ['tintuc' => $tintuc]);
	}

  public function create()
	{
		$theloai = Theloai::all();
		$loaitin = LoaiTin::all();
		return view('admin.tintuc.them', ['theloai' => $theloai, 'loaitin' => $loaitin]);
	}

	public function store(TinTucRequest $request)
	{
		TinTuc::saveTinTuc($request);
		return redirect()->route('admin.tintuc.create')->with('thongbao', 'Thêm tin tức thành công');
	}

	public function destroy($id)
	{
		TinTuc::deleteTinTuc($id);
		return redirect()->route('admin.tintuc.index')->with('thongbao', 'Xoá tin tức thành công');
	}

	public function edit($id)
	{
		$allTheLoai = Theloai::all();
		$theloai = Theloai::convertToArrayTypeKeyValueTheLoai($allTheLoai);
		$allLoaiTin = LoaiTin::all();
		$loaitin = LoaiTin::convertToArrayTypeKeyValueLoaiTin($allLoaiTin);

		$tintuc = TinTuc::find($id);
		$idTheLoaiSelected = $tintuc->loaitin->theloai->id;
		$idLoaiTinSelected = $tintuc->loaitin->id;
		return view('admin.tintuc.sua', 
			[
				'theloai' => $theloai, 
				'loaitin' => $loaitin,
				'tintuc' => $tintuc, 
				'idTheLoaiSelected' => $idTheLoaiSelected,
				'idLoaiTinSelected' => $idLoaiTinSelected,
			]);
	}

	public function update(TinTucRequest $request, $id) 
	{
		TinTuc::updateTinTuc($request, $id);
		return redirect()->route('admin.tintuc.edit', [$id])->with('thongbao', 'Sửa tin tức thành công');
	}
}




