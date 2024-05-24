<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValueRequest;
use App\Models\Value;
use App\Models\ValueImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ValueController extends DashboardController
{

    public function __construct(Value $model)
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
    public function store(ValueRequest $request)
    {

        $Value = Value::create();

        if ($request->has('images')) {
            foreach ($request->images as $image) {
 
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
 
                $image->move(public_path('images/Value'), $imageName);
     
                $Value->images()->create(['image' => $imageName]);
            }
        }


        foreach ($request->all() as $locale => $data) {
            if (is_array($data) && isset($data['title'])) {
                $Value->translateOrNew($locale)->title = $data['title'];
            }
            if (is_array($data) && isset($data['description'])) {
                $Value->translateOrNew($locale)->description = $data['description'];
            }
        }

        $Value->save();
        session()->flash('success','The creation has been saved successfully');


        return redirect($this->index_route);
    }


    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(ValueRequest $request, Value $Value)
    {
 
        if ($request->has('images')) {
         
            $oldImages = ValueImage::where('value_id', $Value->id)->get();
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('images/Value/' . $oldImage->image);
                if (File::exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $oldImage->delete();
            }

         
            foreach ($request->images as $image) {
                 
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
 
                $image->move(public_path('images/Value'), $imageName);
                
                $Value->images()->create(['image' => $imageName]);
            }
        }

        $Value->update($request->except('images'));

        session()->flash('success','The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
