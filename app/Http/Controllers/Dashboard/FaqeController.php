<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqeRequest;
use App\Models\Faqe;
use Illuminate\Http\Request;

class FaqeController extends DashboardController
{
    public function __construct(Faqe $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'recycleBin', 'store', 'update', 'show', 'edit'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(FaqeRequest $request)
    {
        $data = $request->all();

        $item = Faqe::create($data);
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(FaqeRequest $request, Faqe $Faqe)
    {
        $data = $request->all();
        $update = $Faqe->update($data);
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
