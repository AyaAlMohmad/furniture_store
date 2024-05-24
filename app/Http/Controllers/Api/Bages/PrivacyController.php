<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $privacies=Privacy::all();
        $data = [];
            
            
        foreach ($privacies as $privacy) {
 
            $id = $privacy->id;
           
            $acceptLanguage = request()->header('Accept-Language');
            $translations = $privacy->getTranslationsArray();
            
            if (isset($translations[$acceptLanguage])) {
              
             
                $selectedprivacy=$translations[$acceptLanguage];
            } 
            $data[] = [
                'id'=>$id,
                 
                'translations'=>$selectedprivacy];
        }
        return $this->indexResponse($data);
      }
}
