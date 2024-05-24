<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends DashboardController
{
    public function __construct(Role $model)
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
    public function store(RoleRequest $request)
    {
        $data = $request->all();
      
        $item = Role::create($data);
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(RoleRequest $request, Role $Role)
    {
        $data = $request->all();
        $update = $Role->update($data);
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);

    }
}
