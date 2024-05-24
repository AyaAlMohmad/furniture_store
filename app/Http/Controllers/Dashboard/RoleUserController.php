<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleUserRequest;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class RoleUserController extends DashboardController
{
    public function __construct(RoleUser $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }

    // ************************************************
    // ************************************************
    // ***********************create********************
    // ************************************************
    // ************************************************
    public function create()
    {
        $items = User::all();
        $roles = Role::all();
        return view('dashboard.pages.role_users.form', compact('items', 'roles'));
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(RoleUserRequest $request)
    {
        if ($request->role_id == []) {
            foreach ($request->role_id as $roleId) {
                RoleUser::create([
                    'user_id' => $request->user_id,
                    'role_id' => $roleId
                ]);
            }
        } else
        
            RoleUser::create($request->all());
            session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************edit********************
    // ************************************************
    // ************************************************
    public function edit($id)
    {
        $role_user = RoleUser::find($id);
        $item = User::where('id', $role_user->user_id)->first();
        $roles = Role::all();
        return view('dashboard.pages.role_users.edit', compact('role_user', 'item', 'roles'));
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(RoleUserRequest $request, RoleUser $RoleUser)
    {


        foreach ($request->role_id as $roleId) {
            $RoleUser->update([
                'user_id' => $request->user_id,
                'role_id' => $roleId
            ]);
        }
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
