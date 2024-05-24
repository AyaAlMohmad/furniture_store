<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\VillaRequest;
use App\Models\Villa;
use App\Models\villaImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class VillaController extends DashboardController
{
    public function __construct(Villa $model)
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
    public function store(VillaRequest $request)
    {
        $pdf = $request->file('pdf');
        $pdfName = $pdf->getClientOriginalName();
 
        $pdf->move(public_path('pdfs/Villa'), $pdfName);
$data['pdf']=$pdfName;

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/Villa'), $imageName);
        $data['image'] = $imageName;

        $Villa = Villa::create($data);
        if ($request->has('images')) {
            foreach ($request->images as $image) {
           
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
 
                $image->move(public_path('images/Villa'), $imageName);
           
                $Villa->images()->create(['image' => $imageName]);
            }
        }
        foreach ($request->all() as $locale => $data) {
            if (is_array($data) && isset($data['title'])) {
                $Villa->translateOrNew($locale)->title = $data['title'];
            }
          
        }

        $Villa->save();
        session()->flash('success','The creation has been saved successfully');


        return redirect($this->index_route);
    }


    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(VillaRequest $request, Villa $Villa)
    {
        $data = $request->except('images');


        if (request()->hasFile('pdf') && request('pdf') != '') {
            $pdfPath = public_path('pdfs/Villa/' . $Villa->pdf);
            if (File::exists($pdfPath)) {
                unlink($pdfPath);
            }
            $pdf = $request->file('pdf');
            $pdfName = $pdf->getClientOriginalName();
       
            $pdf->move(public_path('pdfs/Villa'), $pdfName);
            $data['pdf']=$pdfName;
          
        }
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/Villa' . $Villa->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/Villa'), $imageName);
            $data['image'] = $imageName;
        }
        $Villa->update($data);
          if ($request->has('images')) {
       
            $oldImages = villaImage::where('villa_id', $Villa->id)->get();
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('images/Villa/' . $oldImage->image);
                if (File::exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $oldImage->delete();
            }

          

            foreach ($request->images as $image) {
              
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
 
                $image->move(public_path('images/Villa'), $imageName);
             
                $Villa->images()->create(['image' => $imageName]);
            }
        }

        session()->flash('success','The modifications were saved successfully');


        return redirect($this->index_route);
    }
}
