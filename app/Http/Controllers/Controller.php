<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
  use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

  function __construct()
  {
  	$this->checkLogin();
  }

  function checkLogin()
  {
  	if(Auth::check()) {
  		//Truyền biến user cho tất cả các trang
  		view()->share('user_login', Auth::user()); 
  	}
  }
}
