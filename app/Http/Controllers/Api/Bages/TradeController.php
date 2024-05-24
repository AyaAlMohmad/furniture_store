<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $Trades=Trade::all();
        $data = [];
            
            
        foreach ($Trades as $Trade) { 
            $id = $Trade->id;
            $acceptLanguage = request()->header('Accept-Language');
            $translations = $Trade->getTranslationsArray();
             
            if (isset($translations[$acceptLanguage])) {
              
             
                $selectedTrade=$translations[$acceptLanguage];
            } 
            $data[] = [
                'id'=>$id,
                'translations'=>$selectedTrade];
        }
        return $this->indexResponse($data);
      }
}
