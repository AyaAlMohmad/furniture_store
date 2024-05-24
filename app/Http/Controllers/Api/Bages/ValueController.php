<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Value;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    use ApiResponseTrait;
  public function index(){
    $values=Value::all();
    $data = [];
        
    $images = [];  
    foreach ($values as $value) {
    
        $id = $value->id;
        $acceptLanguage = request()->header('Accept-Language');
        $translations = $value->getTranslationsArray();
        foreach ($value->images as $image) {
            $images[] = 'images/Value/' . $image->image;
        }
    
        if (isset($translations[$acceptLanguage])) {
          
         
            $selectedvalue=$translations[$acceptLanguage];
        } 
        $data[] = [
            'id'=>$id,
            'translations'=>$selectedvalue,
        'images'=>$images
        ];
    }
    return $this->indexResponse($data);
  }
}
