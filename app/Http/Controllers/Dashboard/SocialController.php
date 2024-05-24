<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SocialController extends DashboardController
{
    public function __construct(Social $model)
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
    public function store(SocialRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/Social'), $imageName);
        $data['image'] = $imageName;
        $item = Social::create($data);
        session()->flash('success','The creation has been saved successfully');

        return redirect($this->index_route);
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(SocialRequest $request, Social $Social)
    {
        $data = $request->all();
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/Social' . $Social->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/Social'), $imageName);
            $data['image'] = $imageName;
            $Social->update($data);
        }
        $update = $Social->update($data);
        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);

    }
}
