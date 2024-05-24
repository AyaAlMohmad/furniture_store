<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvestorRequest;
use App\Models\Investor;
use Illuminate\Http\Request;

class InvestorController extends DashboardController
{
   
    
    public function __construct(Investor $model)
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
    public function store(InvestorRequest $request)
    {
        $item = Investor::create($request->all());
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(InvestorRequest $request, Investor $Investor)
    {
        $data = $request->all();
         $Investor->update($data);
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);

    }
}
