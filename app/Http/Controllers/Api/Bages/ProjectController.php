<?php

namespace App\Http\Controllers\Api\Bages;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  use ApiResponseTrait;
    public function index(){
      $histories=Project::all();
      $data = [];
      $images = [];
          
      foreach ($histories as $Project) {
    
          $id = $Project->id;
          $pdf='pdfs/Project/' .$Project->pdf;
          $acceptLanguage = request()->header('Accept-Language');
          $translations = $Project->getTranslationsArray();
           
          foreach ($Project->images as $image) {
            $images[] = 'images/Project/' . $image->image;
        }
          if (isset($translations[$acceptLanguage])) {
            
           
              $selectedProject=$translations[$acceptLanguage];
          } 
          $data[] = [
              'id'=>$id,
              'pdf'=>$pdf,
              'translations'=>$selectedProject,
            'images'=>$images,
            ];
      }
      return $this->indexResponse($data);
    }
    public function show($id){
      $Project=Project::find($id);
      $data = [];
      $images = [];
          
    
    
          $id = $Project->id;
          $pdf='pdfs/Project/' .$Project->pdf;

          $acceptLanguage = request()->header('Accept-Language');
          $translations = $Project->getTranslationsArray();
         
          foreach ($Project->images as $image) {
            $images[] = 'images/Project/' . $image->image;
        }
          if (isset($translations[$acceptLanguage])) {
            
           
              $selectedProject=$translations[$acceptLanguage];
          } 
          $data[] = [
              'id'=>$id,
              'pdf'=>$pdf,
              'translations'=>$selectedProject,
            'images'=>$images,
            ];
    
      return $this->showResponse($data);
    }
  }
  