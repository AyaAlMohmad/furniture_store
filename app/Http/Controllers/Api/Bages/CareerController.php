<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\OrderJob;
use App\Models\OrderjobCareer;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $Careers = Career::all();
        $data = [];


        foreach ($Careers as $Career) {
 
            $id = $Career->id;
            $acceptLanguage = request()->header('Accept-Language');
            $translations = $Career->getTranslationsArray();
 
            if (isset($translations[$acceptLanguage])) {


                $selectedCareer = $translations[$acceptLanguage];
            }
            $data[] = [
                'id' => $id,
                'translations' => $selectedCareer
            ];
        }
        return $this->indexResponse($data);
    }
    public function store(Request $request)
    {
        $career=Career::where('id',$request->id_career)->first();
        $acceptLanguage = request()->header('Accept-Language');
        $translations = $career->getTranslationsArray();
        if (isset($translations[$acceptLanguage])) {


            $selectedCareer = $translations[$acceptLanguage];
        }
          $pdf = $request->file('pdf');
          $pdfName = $pdf->getClientOriginalName();
    
          $pdf->move(public_path('pdfs/career'), $pdfName);
       
          $Career = OrderJob::create([
        
            'name' => $request->name,
            'phone' => $request->phone,
            'cv' => $pdfName
          ]);
          
          if ($Career) {
            $order = OrderjobCareer::create([
                'order_job_id' => $Career->id,
                'career_id' => $request->id_career
            ]);
            $data = [
                'Career' =>$selectedCareer['title'],
                'Name' => $request->name,
                'telephone' => $request->phone,
                'Cv' => $pdfName
            ];
            return $this->storeResponse($data);
          }
          return $this->dontSaveResponse();
          
    }
}
