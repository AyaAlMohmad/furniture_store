<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\OrderJob;
use App\Models\OrderjobCareer;
use Illuminate\Http\Request;

class OrderJobController extends DashboardController
{
    public function __construct(OrderJob $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'index',   'show', 'recycleBin'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
    public function index()
    {
        $items = OrderJob::all();
        $orderjob = OrderjobCareer::all();
    
        return view('dashboard.pages.order_jobs.index',compact('items','orderjob'));
    }
    public function show($id)
    {
        $item = OrderJob::find($id);
       
    
        return view('dashboard.pages.order_jobs.index', compact('orderjob'));
    }

   
}

