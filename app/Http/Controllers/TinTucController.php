<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

	public function postThem(Request $request)
	{
		$this->validate($request,
			[
				'LoaiTin' => 'required',
				'TieuDe'  => 'required|min:3|max:100',
				'TomTat'	=> 'required',
				'NoiDung' => 'required',
				'NoiBat'  => 'required',

			],
			[
				'LoaiTin.required' => 'Bạn chưa chọn loại tin',
				'TieuDe.required'  => 'Bạn chưa chọn tiêu đề',
				'TieuDe.min'			 => 'Tiêu đề phải >= 3 kí tự',
				'TieuDe.max'			 => 'Tiêu đề phải <= 100 kí tự',
				'TomTat.required'  => 'Bạn chưa nhập tóm tắt',
				'NoiDung.required'  => 'Bạn chưa nhập nội dung',
				'NoiBat.required'  => 'Bạn chưa chọn tin nổi bật',
			]
		);

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

	public function postSua(Request $request, $id) 
	{
		exit(var_dump($id));
	}
}



