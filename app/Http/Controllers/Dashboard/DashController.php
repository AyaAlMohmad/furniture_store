<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

class DashController extends DashboardController
{
    public function __construct()
    {
        
        $this->middleware(['auth','chekUser:admin']);

        view()->share([
            'module_name' => 'dash',

            'method_name' => 'index',

        ]);
    }
    public function index(){
        return view('dashboard.layout.dashboard');
    }
}
