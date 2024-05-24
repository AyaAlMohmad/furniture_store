<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends DashboardController
{
    public function __construct(Solution $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'store', 'update','show','edit','recycleBin'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(Request $request)
    {
        $item = Solution::create($request->all());
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(Request $request, Solution $Solution)
    {
        $data = $request->all();
         $Solution->update($data);
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);

    }
}
