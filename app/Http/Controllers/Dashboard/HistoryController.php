<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;
use App\Models\History;
use App\Models\HistoryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class HistoryController extends DashboardController
{
   
    public function __construct(History $model)
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
    public function store(HistoryRequest $request)
    {

        $History = History::create([
            'date'=>$request->date
        ]);

        if ($request->has('images')) {
            foreach ($request->images as $image) {
                
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('images/History'), $imageName);
         
                $History->images()->create(['image' => $imageName]);
            }
        }


        foreach ($request->all() as $locale => $data) {
            if (is_array($data) && isset($data['title'])) {
                $History->translateOrNew($locale)->title = $data['title'];
            }
            if (is_array($data) && isset($data['description'])) {
                $History->translateOrNew($locale)->description = $data['description'];
            }
        }

        $History->save();
        session()->flash('success','The creation has been saved successfully');


        return redirect($this->index_route);
    }


    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(HistoryRequest $request, History $History)
    {
        $data = $request->all();

        if ($request->has('images')) {
        
            $oldImages = HistoryImage::where('history_id', $History->id)->get();
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('images/History/' . $oldImage->image);
                if (File::exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $oldImage->delete();
            }


            foreach ($request->images as $image) {
            
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('images/History'), $imageName);
           
                $History->images()->create(['image' => $imageName]);
            }
        }

       
        $History->update($request->except('images'));

        session()->flash('success','The modifications were saved successfully');


        return redirect($this->index_route);
    }
}
