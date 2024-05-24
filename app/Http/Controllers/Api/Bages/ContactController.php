<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ContactController extends Controller
{ use ApiResponseTrait;
    public function index(){
      $contacts=Contact::all();
      $data = [];
          
      foreach ($contacts as $Contact) {
    
          $id = $Contact->id;
   
          $data[] = [
              'id'=>$id,
              'location'=>$Contact->location,
              'email'=>$Contact->email,
              'website'=>$Contact->website,
            'phone'=>$Contact->phone,
            ];
      }
      return $this->indexResponse($data);
    }
  }
  