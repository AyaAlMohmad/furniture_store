<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends DashboardController
{
    public function __construct(Category $model)
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
    public function store(CategoryRequest $request)
    {
        $item = Category::create($request->all());
        session()->flash('success', 'The creation has been saved successfully');
        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $category->update($data);
        session()->flash('success', 'The modifications were saved successfully');
        return redirect($this->index_route);
    }
}
