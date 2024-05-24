<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Villa;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class VillaController extends Controller
{
  use ApiResponseTrait;
  public function index()
  {
    $villas = Villa::all();
    $data = [];
    $images = [];

    foreach ($villas as $Villa) {

      $id = $Villa->id;
      $pdf = 'pdfs/Villa/' . $Villa->pdf;
      $acceptLanguage = request()->header('Accept-Language');
      $translations = $Villa->getTranslationsArray();
       

      $image_first = 'images/Villa/' . $Villa->image;
      foreach ($Villa->images as $image) {
        $images[] = 'images/Villa/' . $image->image;
      }
      if (isset($translations[$acceptLanguage])) {


        $selectedVilla = $translations[$acceptLanguage];
      }
      $data[] = [
        'id' => $id,
        'pdf' => $pdf,
        'translations' => $selectedVilla,
        'image' => $image_first,
        'images' => $images
      ];
    }
    return $this->indexResponse($data);
  }
  public function show($id)
  {
    $Villa = Villa::find($id);
    $data = [];
    $images = [];



    $id = $Villa->id;
    $pdf = 'pdfs/Villa/' . $Villa->pdf;

    $acceptLanguage = request()->header('Accept-Language');
    $translations = $Villa->getTranslationsArray();
     

    $image_first = 'images/Villa/' . $Villa->image;
    foreach ($Villa->images as $image) {
      $images[] = 'images/Villa/' . $image->image;
    }
    if (isset($translations[$acceptLanguage])) {


      $selectedVilla = $translations[$acceptLanguage];
    }
    $data[] = [
      'id' => $id,
      'pdf' => $pdf,
      'translations' => $selectedVilla,
      'image' => $image_first,
      'images' => $images
    ];

    return $this->showResponse($data);
  }
}
