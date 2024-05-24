<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CareerRequest;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends DashboardController
{

    public function __construct(Career $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit', 'recycleBin'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(CareerRequest $request)
    {
        $item = Career::create($request->all());
        session()->flash('success', 'The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(CareerRequest $request, Career $Career)
    {
        $data = $request->all();
        $Career->update($data);
        session()->flash('success', 'The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
