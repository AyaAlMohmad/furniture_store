<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CatalogRequest;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CatalogController extends DashboardController
{
    public function __construct(Catalog $model)
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
    public function store(CatalogRequest $request)
    {
        $pdf = $request->file('pdf');
        $pdfName = $pdf->getClientOriginalName();
      
        $pdf->move(public_path('pdfs/catalog'), $pdfName);
        $Catalog = Catalog::create([
            'pdf' => $pdfName
        ]);

       


        foreach ($request->all() as $locale => $data) {
            if (is_array($data) && isset($data['title'])) {
                $Catalog->translateOrNew($locale)->title = $data['title'];
            }
            
        }

        $Catalog->save();
        session()->flash('success','The creation has been saved successfully');


        return redirect($this->index_route);
    }


    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(CatalogRequest $request, Catalog $Catalog)
    {
        $data = $request->all();


        if (request()->hasFile('pdf') && request('pdf') != '') {
            $pdfPath = public_path('pdfs/catalog/' . $Catalog->pdf);
            if (File::exists($pdfPath)) {
                unlink($pdfPath);
            }
            $pdf = $request->file('pdf');
            $pdfName = $pdf->getClientOriginalName();
           
            $pdf->move(public_path('pdfs/catalog'), $pdfName);
            $data['pdf']=$pdfName;
            $Catalog->update($data);
     

        }    
     

       
        
        $Catalog->update($data);

        session()->flash('success','The modifications were saved successfully');


        return redirect($this->index_route);
    }
}
