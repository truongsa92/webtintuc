<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class LanguageController extends Controller
{
	public function postLang(Request $request)
  {
    $request->session()->put('locale', $request->locale);
    return redirect()->back();
  }
}
