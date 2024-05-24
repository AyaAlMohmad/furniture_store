<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends DashboardController
{
    public function __construct(Order $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy',  'index', 'show'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
   
}
