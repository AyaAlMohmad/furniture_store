<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesignerRequest;
use App\Models\Designer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DesignerController extends DashboardController
{
    public function __construct(Designer $model)
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
    public function store(DesignerRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/designer'), $imageName);
        $data['image'] = $imageName;
        $item = Designer::create($data);
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(DesignerRequest $request, Designer $Designer)
    {
        $data = $request->all();
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/designer' . $Designer->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/designer'), $imageName);
            $data['image'] = $imageName;
            $Designer->update($data);
        }
        $update = $Designer->update($data);
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);

    }
}
