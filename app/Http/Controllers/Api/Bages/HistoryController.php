<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    use ApiResponseTrait;
    public function index(){
      $histories=History::all();
      $data = [];
      $images = [];
          
      foreach ($histories as $history) {
    
          $id = $history->id;
          $acceptLanguage = request()->header('Accept-Language');
          $translations = $history->getTranslationsArray();
      
          foreach ($history->images as $image) {
            $images[] = 'images/History/' . $image->image;
        }
          if (isset($translations[$acceptLanguage])) {
            
           
              $selectedhistory=$translations[$acceptLanguage];
          } 
          $data[] = [
              'id'=>$id,
              'date'=>$history->date,
              'translations'=>$selectedhistory,
            'images'=>$images,
            ];
      }
      return $this->indexResponse($data);
    }
  }
  