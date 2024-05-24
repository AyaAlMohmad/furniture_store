<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Investor;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $investors=Investor::all();
        $data = [];
            
            
        foreach ($investors as $Investor) {
   
            $id = $Investor->id;
            $date=$Investor->date;
            $acceptLanguage = request()->header('Accept-Language');
            $translations = $Investor->getTranslationsArray();
    
            if (isset($translations[$acceptLanguage])) {
              
             
                $selectedInvestor=$translations[$acceptLanguage];
            } 
            $data[] = [
                'id'=>$id,
                'date'=>$date,
                'translations'=>$selectedInvestor];
        }
        return $this->indexResponse($data);
      }
}

