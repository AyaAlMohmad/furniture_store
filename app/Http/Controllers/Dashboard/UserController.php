<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends DashboardController
{
   
    public function __construct(User $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy',  'store', 'update','show','edit'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
     // ************************************************
    // ************************************************
    // ***********************edit********************
    // ************************************************
    // ************************************************
    public function edit($id)
    {
        $item = User::find($id);
    
        return view('dashboard.pages.users.edit', compact( 'item'));
    }
     // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(Request $request, User $User)
    {


        $data=$request->all();
        $User->update($data);
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
