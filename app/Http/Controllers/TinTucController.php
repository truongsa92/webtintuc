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
  public function getDanhSach()
  {	
  	$tintuc = TinTuc::all();
  	return view('admin.tintuc.danhsach', ['tintuc' => $tintuc]);
  }

  public function getThem()
	{
		$theloai = Theloai::all();
		$loaitin = LoaiTin::all();
		return view('admin.tintuc.them', ['theloai' => $theloai, 'loaitin' => $loaitin]);
	}

	public function postThem(TinTucRequest $request)
	{
		$tintuc = new TinTuc;
		$tintuc->TieuDe = $request->TieuDe;
		$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
		$tintuc->TomTat = $request->TomTat;
		$tintuc->NoiDung = $request->NoiDung;
		$tintuc->NoiBat = $request->NoiBat;

		//Nếu người dùng chọn hình ảnh để upload
		if($request->hasFile('HinhAnh')) {
			$file = $request->file('HinhAnh');
			$name = $file->getClientOriginalName();

			$ext = $file->getClientOriginalExtension();

			//Kiểm tra xem file có phải là ảnh không
			if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png') {
				if (file_exists('upload/tintuc')) {
					$file->move('upload/tintuc', $name);
				}
				$tintuc->Hinh = $name;
			} else {
				$tintuc->Hinh = "";
			}
		} else {
			$tintuc->Hinh = "";
		}
		$tintuc->idLoaiTin = $request->LoaiTin;
		//Chưa làm chức năng đki cho user nên em để mặc định id là admin
		$tintuc->idUser = 1;
		$tintuc->save();

		return redirect('admin/tintuc/them')->with('thongbao', 'Thêm tin tức thành công');
	}

	public function getXoa($id)
	{
		$tintuc = TinTuc::find($id);
		$tintuc->delete();
		//Xoá ảnh
		unlink('upload/tintuc/'.$tintuc->Hinh);
		return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xoá tin tức thành công');
	}

	public function getSua($id)
	{
		$theloai = Theloai::all();
		$loaitin = LoaiTin::all();
		$tintuc = TinTuc::find($id);
		$idTheLoaiSelected = $tintuc->loaitin->theloai->id;

		return view('admin.tintuc.sua', ['theloai' => $theloai, 'loaitin' => $loaitin,
																			'tintuc' => $tintuc, 'idTheLoaiSelected' => $idTheLoaiSelected]);
	}

	public function postSua(TinTucRequest $request, $id) 
	{
		$tintuc = TinTuc::find($id);
		$tintuc->TieuDe = $request->TieuDe;
		$tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
		$tintuc->TomTat = $request->TomTat;
		$tintuc->NoiDung = $request->NoiDung;
		$tintuc->NoiBat = $request->NoiBat;

		//Nếu người dùng chọn hình ảnh để upload
		if($request->hasFile('HinhAnh')) {
			$file = $request->file('HinhAnh');
			$name = $file->getClientOriginalName();

			//Xoá ảnh cũ 
			unlink('upload/tintuc/'.$tintuc->Hinh);

			$ext = $file->getClientOriginalExtension();

			//Kiểm tra xem file có phải là ảnh không
			if ($ext === 'jpg' || $ext === 'jpeg' || $ext === 'png') {
				if (file_exists('upload/tintuc')) {
					$file->move('upload/tintuc', $name);
				}
				$tintuc->Hinh = $name;
			} else {
				$tintuc->Hinh = "";
			}
		} 
		$tintuc->idLoaiTin = $request->LoaiTin;
		//Chưa làm chức năng đki cho user nên em để mặc định id là admin
		$tintuc->idUser = Auth::user()->id;
		$tintuc->save();

		return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Sửa tin tức thành công');
	}
}




