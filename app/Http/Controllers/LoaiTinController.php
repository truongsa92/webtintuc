<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

  public function postThem(Request $request)
  {
  	$this->validate($request,
  		[
  			'TheLoai' => 'required',
  			'Ten'			=> 'required|unique:LoaiTin,Ten|min:2|max:100'
  		],
  		[
				'Ten.required' => 'Bạn chưa nhập tên loại tin',
				'Ten.unique'	 => 'Tên loại tin đã tồn tại',
				'Ten.min'			 => 'Tên phải > 1 kí tự',
				'Ten.max'      => 'Tên phải < 100 kí tự',
				'TheLoai.required' => 'Bạn chưa chọn thể loại',
			]
  	);
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

  public function postSua(Request $request, $id) 
	{
		$this->validate($request,
			[
				'Ten'     => 'required|unique:LoaiTin,Ten|min:2|max:100',
				'TheLoai' => 'required',
			],
			[
				'Ten.required' => 'Bạn chưa nhập tên loại tin',
				'Ten.unique'	 => 'Tên loại tin đã tồn tại',
				'Ten.min'			 => 'Tên phải > 1 kí tự',
				'Ten.max'      => 'Tên phải < 100 kí tự',
				'TheLoai.required' => 'Bạn chưa chọn thể loại',
			]
		);
		$loaitin = LoaiTin::find($id);
		$loaitin->Ten = $request->Ten;
		$loaitin->TenKhongDau = changeTitle($request->Ten);
		$loaitin->idTheLoai = $request->TheLoai;

		$loaitin->save();
		return redirect('admin/loaitin/sua/'.$id)->with('thongbao', 'Bạn đã sửa thành công');
	}
}