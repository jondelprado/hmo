<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function category(){

      $sidebarStatus = array(
        'category_menu' => 'menu-open',
        'category_link' => 'active'
      );

      return view('category.index')->with($sidebarStatus);
    }
}
