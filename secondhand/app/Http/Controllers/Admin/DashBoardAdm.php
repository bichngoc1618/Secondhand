<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardAdm extends Controller
{
    public function home(){
        return view ('Admin.home');
    }
   
}
