<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    protected $model;
    protected $dash_view = 'dashboard.pages';
    protected $module_name;
    protected $controller_name;
    protected $method_name;
    protected $method_view;
    protected $module_actions = [];

    protected $index_route;

    public function __construct(Model $model = null)
    {
        $this->model = $model;
        $this->controller_name = $this->getControllerName();
        $this->module_name = Str::snake(Str::plural($this->controller_name));
        $this->method_name = request()->route()->getActionMethod();
        $this->method_view = $this->dash_view . '.' . $this->module_name . '.' . $this->method_name;

        $this->index_route = route($this->module_name . '.index');

        $this->module_actions = ['destroy', 'create', 'index', 'store', 'recycleBin', 'update', 'show', 'edit'];
        view()->share([
            'module_name' => $this->module_name,
            'method_name' => $this->method_name,
            'module_actions' => $this->module_actions

        ]);
    }
    // ************************************************
    // ************************************************
    // ***********************Index********************
    // ************************************************
    // ************************************************
    public function index()
    {
        $items = $this->model->all();
        return view($this->dash_view . '.' . $this->module_name . '.index')
            ->with('items', $items);
    }
    // ************************************************
    // ************************************************
    // ***********************Show********************
    // ************************************************
    // ************************************************
    public function show($id)
    {
        $item = $this->model->find($id);
        return view(
            $this->dash_view . '.' . $this->module_name . '.show',
            compact('item')
        );
    }
    // ************************************************
    // ************************************************
    // **********************Create********************
    // ************************************************
    // ************************************************
    public function create()
    {
        return view($this->dash_view . '.' . $this->module_name . '.form');
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    // public function store()
    // {
    // }



    // ************************************************
    // ************************************************
    // ***********************Edit*********************
    // ************************************************
    // ************************************************
    public function edit($id)
    {

        $item = $this->model->withTrashed()->findOrFail($id);
        return view($this->method_view, compact('item'));
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    // public function update()
    // {
    // }



    // ************************************************
    // ************************************************
    // ***********************Delete*******************
    // ************************************************
    // ************************************************
    public function destroy($id)
    {
        $item = $this->model->findOrFail($id)->delete();

        session()->flash('success', 'Moved to Recycle Bin');
        return redirect()->back();
    }
    // ************************************************
    // ************************************************
    // ***********************Restore******************
    // ************************************************
    // ************************************************
    public function restore($id)
    {
        $item = $this->model::withTrashed()->find($id);
        $restore = $item->restore();
        session()->flash('success', 'Data has been restored');

        return redirect()->back();
    }
    // ************************************************
    // ************************************************
    // ***********************RecycleBin***************
    // ************************************************
    // ************************************************
    public function recycleBin()
    {
        $items = $this->model->onlyTrashed()->get();
        return view(
            $this->dash_view . '.' . $this->module_name . '.recycleBin',
            compact('items')
        );
    }

    // ************************************************
    // ************************************************
    // ***********************FinalDelete**************
    // ************************************************
    // ************************************************
    public function finalDelete($id)
    {
        $item = $this->model::withTrashed()->find($id);
        $finalDelete = $item->forceDelete();
        session()->flash('success', 'Permanently deleted');

        return redirect()->back();
    }
    // ************************************************
    // ************************************************
    // ***************getControllerName****************
    // ************************************************
    // ************************************************
    protected function getControllerName()
    {
        return str_replace('Controller', '', class_basename($this));
    }
}
