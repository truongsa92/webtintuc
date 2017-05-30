<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\LoaiTin;

class AjaxController extends Controller
{
  public function getLoaiTin($id)
	{
		$loaitin = LoaiTin::where('idTheLoai', '=', $id)->get();
		$builder = '';
		foreach ($loaitin as $lt) {
			$builder .= "<option value='".$lt->id."'>".$lt->Ten."</option>";
		}
		return $builder;
	}
}
