<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\DesignService;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class DesignServiceController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $histories=DesignService::all();
        $data = [];
        $images = [];
            
        foreach ($histories as $DesignService) {
      
            $id = $DesignService->id;
            $acceptLanguage = request()->header('Accept-Language');
            $translations = $DesignService->getTranslationsArray();
    
            foreach ($DesignService->images as $image) {
              $images[] = 'images/designService/' . $image->image;
          }
            if (isset($translations[$acceptLanguage])) {
              
             
                $selectedDesignService=$translations[$acceptLanguage];
            } 
            $data[] = [
                'id'=>$id,
                'translations'=>$selectedDesignService,
              'images'=>$images,
              ];
        }
        return $this->indexResponse($data);
      }
}

