<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AboutController extends Controller
{
  
    use ApiResponseTrait;
    public function index(){
      $histories=About::all();
      $data = [];
          
      foreach ($histories as $About) {
    
          $id = $About->id;
          $acceptLanguage = request()->header('Accept-Language');
          $translations = $About->getTranslationsArray();
 
      $images  = 'images/about/' . $About->image;
      
          if (isset($translations[$acceptLanguage])) {
            
           
              $selectedAbout=$translations[$acceptLanguage];
          } 
          $data[] = [
              'id'=>$id,
              'translations'=>$selectedAbout,
            'images'=>$images,
            ];
      }
      return $this->indexResponse($data);
    }
  }
  