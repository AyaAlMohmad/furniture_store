<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataPolicyRequest;
use App\Models\DataPolicy;
use Illuminate\Http\Request;

class DataPolicyController extends DashboardController
{

    public function __construct(DataPolicy $model)
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
    public function store(DataPolicyRequest $request)
    {
        $item = DataPolicy::create($request->all());
        session()->flash('success', 'The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(DataPolicyRequest $request, DataPolicy $DataPolicy)
    {
        $data = $request->all();
        $DataPolicy->update($data);
        session()->flash('success', 'The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
