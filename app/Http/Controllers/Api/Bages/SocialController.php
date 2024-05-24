<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    use ApiResponseTrait;
    public function index(){
      $histories=Social::all();
      $data = [];
          
      foreach ($histories as $Social) {
    
          $id = $Social->id;
          $acceptLanguage = request()->header('Accept-Language');
          $translations = $Social->getTranslationsArray();
  
      $images  = 'images/Social/' . $Social->image;
      
          if (isset($translations[$acceptLanguage])) {
            
           
              $selectedSocial=$translations[$acceptLanguage];
          } 
          $data[] = [
              'id'=>$id,
              'type'=>$Social->type,
              'link'=>$Social->link,
              'translations'=>$selectedSocial,
            'images'=>$images,
            ];
      }
      return $this->indexResponse($data);
    }
  }
  