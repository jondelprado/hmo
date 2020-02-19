<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $sidebarStatus = array(
        'maintenance_menu' => 'menu_close',
        'maintenance_link' => 'link_inactive'
      );
        return view('dashboard')->with($sidebarStatus);
    }
}
