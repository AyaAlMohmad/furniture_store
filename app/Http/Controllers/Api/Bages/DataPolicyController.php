<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\DataPolicy;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class DataPolicyController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $DataPolicies=DataPolicy::all();
        $data = [];
            
            
        foreach ($DataPolicies as $DataPolicy) {
        
            $id = $DataPolicy->id;
            $acceptLanguage = request()->header('Accept-Language');
            $translations = $DataPolicy->getTranslationsArray();
      
            if (isset($translations[$acceptLanguage])) {
              
             
                $selectedDataPolicy=$translations[$acceptLanguage];
            } 
            $data[] = [
                'id'=>$id,
                'translations'=>$selectedDataPolicy];
        }
        return $this->indexResponse($data);
      }
}

