<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    
    use ApiResponseTrait;
    public function index(){
        $Solutions=Solution::all();
        $data = [];
            
            
        foreach ($Solutions as $Solution) {
  
            $id = $Solution->id;
            $acceptLanguage = request()->header('Accept-Language');
            $translations = $Solution->getTranslationsArray();
 
            if (isset($translations[$acceptLanguage])) {
              
             
                $selectedSolution=$translations[$acceptLanguage];
            } 
            $data[] = [
                'id'=>$id,
                'translations'=>$selectedSolution];
        }
        return $this->indexResponse($data);
      }
}
