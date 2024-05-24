<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DesignServiceRequest;
use App\Models\DesignService;
use App\Models\DesignServiceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DesignServiceController extends DashboardController
{

    public function __construct(DesignService $model)
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
    public function store(DesignServiceRequest $request)
    {

        $DesignService = DesignService::create();

        if ($request->has('images')) {
            foreach ($request->images as $image) {

                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/designService'), $imageName);
                $DesignService->images()->create(['image' => $imageName]);
            }
        }


        foreach ($request->all() as $locale => $data) {
            if (is_array($data) && isset($data['title'])) {
                $DesignService->translateOrNew($locale)->title = $data['title'];
            }
            if (is_array($data) && isset($data['description'])) {
                $DesignService->translateOrNew($locale)->description = $data['description'];
            }
        }

        $DesignService->save();

        session()->flash('success', 'The creation has been saved successfully');

        return redirect($this->index_route);
    }


    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(DesignServiceRequest $request, DesignService $DesignService)
    {
        $data = $request->all();


        if ($request->has('images')) {

            $oldImages = DesignServiceImage::where('design_service_id', $DesignService->id)->get();
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('images/DesignService/' . $oldImage->image);
                if (File::exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $oldImage->delete();
            }



            foreach ($request->images as $image) {

                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('images/DesignService'), $imageName);

                $DesignService->images()->create(['image' => $imageName]);
            }
        }



        $DesignService->update($request->except('images'));



        session()->flash('success', 'The modifications were saved successfully');


        return redirect($this->index_route);
    }
}
