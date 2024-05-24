<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends DashboardController
{

    public function __construct(Contact $model)
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
    public function store(ContactRequest $request)
    {
        $data = $request->all();

        $item = contact::create($data);
        session()->flash('success', 'The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(ContactRequest $request, contact $contact)
    {
        $data = $request->all();
        $update = $contact->update($data);
        session()->flash('success', 'The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
