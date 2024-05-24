<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoryController extends DashboardController
{
    public function __construct(SubCategory $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit','recycleBin'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }

    // ************************************************
    // ************************************************
    // **********************Create********************
    // ************************************************
    // ************************************************
    public function create()
    {
        $items = Category::all();

        return view('dashboard.pages.sub_categories.form', compact('items'));
    }


    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(SubCategoryRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/subcategory'), $imageName);
        $data['image'] = $imageName;
        $item = SubCategory::create($request->all());
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // **********************Edit********************
    // ************************************************
    // ************************************************
    public function edit($id)
    {
        $item = SubCategory::withTrashed()->findOrFail($id);
        $items= Category::all();
        return view('dashboard.pages.sub_categories.edit', compact('item','items'));
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(Request $request, $id)
    {
        $subcategory=SubCategory::findOrFail($id);
        $data = $request->all();
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/subcategory' . $subcategory->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/subcategory'), $imageName);
            $data['image'] = $imageName;
        $subcategory->update($data);
        }
        $subcategory->update($data);

        session()->flash('success','The modifications were saved successfully');

       return redirect($this->index_route);
  }
}
