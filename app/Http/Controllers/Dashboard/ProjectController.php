<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProjectController extends DashboardController
{
    public function __construct(Project $model)
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
    public function store(ProjectRequest $request)
    {
        $pdf = $request->file('pdf');
        $pdfName = $pdf->getClientOriginalName();
       
        $pdf->move(public_path('pdfs/Project'), $pdfName);
        $Project = Project::create([
            'pdf' => $pdfName
        ]);

        if ($request->has('images')) {
            foreach ($request->images as $image) {
          
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

               
                $image->move(public_path('images/Project'), $imageName);
         
                $Project->images()->create(['image' => $imageName]);
            }
        }


        foreach ($request->all() as $locale => $data) {
            if (is_array($data) && isset($data['title'])) {
                $Project->translateOrNew($locale)->title = $data['title'];
            }
            if (is_array($data) && isset($data['description'])) {
                $Project->translateOrNew($locale)->description = $data['description'];
            }
        }

        $Project->save();
        session()->flash('success','The creation has been saved successfully');


        return redirect($this->index_route);
    }


    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(ProjectRequest $request, Project $Project)
    {
        $data = $request->except('images');


        if (request()->hasFile('pdf') && request('pdf') != '') {
            $pdfPath = public_path('pdfs/Project/' . $Project->pdf);
            if (File::exists($pdfPath)) {
                unlink($pdfPath);
            }
            $pdf = $request->file('pdf');
            $pdfName = $pdf->getClientOriginalName();
        
            $pdf->move(public_path('pdfs/Project'), $pdfName);
            $data['pdf']=$pdfName;
            $Project->update($data);
       

        }    
      
        if ($request->has('images')) {
 
            $oldImages = ProjectImage::where('project_id', $Project->id)->get();
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path('images/Project/' . $oldImage->image);
                if (File::exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $oldImage->delete();
            }

         

            foreach ($request->images as $image) {
              
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

               
                $image->move(public_path('images/Project'), $imageName);
                
                $Project->images()->create(['image' => $imageName]);
            }
        }
        
        $Project->update($data);

        session()->flash('success','The modifications were saved successfully');


        return redirect($this->index_route);
    }
}
