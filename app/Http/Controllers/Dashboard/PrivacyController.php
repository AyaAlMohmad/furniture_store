<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrivacyRequest;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends DashboardController
{
    public function __construct(Privacy $model)
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
    public function store(PrivacyRequest $request)
    {
        $item = Privacy::create($request->all());
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(PrivacyRequest $request, Privacy $Privacy)
    {
        $data = $request->all();
        $Privacy->update($data);
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
