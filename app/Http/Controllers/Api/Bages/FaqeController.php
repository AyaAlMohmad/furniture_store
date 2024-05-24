<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Faqe;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class FaqeController extends Controller
{
    use ApiResponseTrait;
  public function index(){
    $faqes=Faqe::all();
    $data = [];
        
        
    foreach ($faqes as $faqe) {
 
        $id = $faqe->id;
        $acceptLanguage = request()->header('Accept-Language');
        $translations = $faqe->getTranslationsArray();
 
        if (isset($translations[$acceptLanguage])) {
          
         
            $selectedfaqe=$translations[$acceptLanguage];
        } 
        $data[] = [
            'id'=>$id,
            'translations'=>$selectedfaqe];
    }
    return $this->indexResponse($data);
  }
}
