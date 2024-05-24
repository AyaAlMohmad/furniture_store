<?php

namespace App\Http\Controllers\Api\product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $data = [];


        foreach ($categories as $category) {
           
            $id = $category->id;
            $acceptLanguage = request()->header('Accept-Language');
       
            $translations = $category->getTranslationsArray();
       
            if (isset($translations[$acceptLanguage])) {


                $selectedcategory = $translations[$acceptLanguage];
            }
            $data[] = [
                'id' => $id,
                'translations' => $selectedcategory
            ];
        }
        return $this->indexResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function showoffic(Request $request)
    {

        $category = Category::find(1);

        $acceptLanguage = request()->header('Accept-Language');
        $translationsCat = $category->getTranslationsArray();
        if (isset($translationsCat[$acceptLanguage])) {
            $selectedcategory = $translationsCat[$acceptLanguage];
        }
        $data = [];  
        foreach ($category->subCategories as $sub) {
        $images  = 'images/subcategory/' . $sub->image;

            $translations = $sub->getTranslationsArray();
            if (isset($translations[$acceptLanguage])) {
                $selectedSubcategory = $translations[$acceptLanguage];
                $data[] = [
                    'category' => $selectedcategory,
                    'Sub_category' => $selectedSubcategory,
                    'id' => $sub->id,
                    'image' => $images,
                ];
            }
        }
        return $this->indexResponse($data);
    }
    public function showschoole(Request $request)
    {

        $category = Category::find(2);
        $acceptLanguage = request()->header('Accept-Language');
        $translationsCat = $category->getTranslationsArray();
        if (isset($translationsCat[$acceptLanguage])) {
            $selectedcategory = $translationsCat[$acceptLanguage];
        }
        $data = [];  
        foreach ($category->subCategories as $sub) {
        $images  = 'images/subcategory/' . $sub->image;

            $translations = $sub->getTranslationsArray();
            if (isset($translations[$acceptLanguage])) {
                $selectedSubcategory = $translations[$acceptLanguage];
                $data[] = [
                    'category' => $selectedcategory,
                    'Sub_category' => $selectedSubcategory,
                    'id' => $sub->id,
                    'image' => $images,
                ];
            }
        }
        return $this->indexResponse($data);
    }
    public function showoutdoor(Request $request)
    {

        $category = Category::find(3);
        $acceptLanguage = request()->header('Accept-Language');
        $translationsCat = $category->getTranslationsArray();
        if (isset($translationsCat[$acceptLanguage])) {
            $selectedcategory = $translationsCat[$acceptLanguage];
        }
        $data = [];  
        foreach ($category->subCategories as $sub) {
        $images  = 'images/subcategory/' . $sub->image;

            $translations = $sub->getTranslationsArray();
            if (isset($translations[$acceptLanguage])) {
                $selectedSubcategory = $translations[$acceptLanguage];
                $data[] = [
                    'category' => $selectedcategory,
                    'Sub_category' => $selectedSubcategory,
                    'id' => $sub->id,
                    'image' => $images,
                ];
            }
        }
        return $this->indexResponse($data);
    }
    public function showhospitality(Request $request)
    {

        $category = Category::find(4);
        $acceptLanguage = request()->header('Accept-Language');
        $translationsCat = $category->getTranslationsArray();
        if (isset($translationsCat[$acceptLanguage])) {
            $selectedcategory = $translationsCat[$acceptLanguage];
        }
        $data = [];  
        foreach ($category->subCategories as $sub) {
        $images  = 'images/subcategory/' . $sub->image;

            $translations = $sub->getTranslationsArray();
            if (isset($translations[$acceptLanguage])) {
                $selectedSubcategory = $translations[$acceptLanguage];
                $data[] = [
                    'category' => $selectedcategory,
                    'Sub_category' => $selectedSubcategory,
                    'id' => $sub->id,
                    'image' => $images,
                ];
            }
        }
        return $this->indexResponse($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
    public function show(Request $request)
    {
       $name = request('name');
       $category = Category::query()
           ->join('category_translations', 'categories.id', '=', 'category_translations.category_id')
           ->where('category_translations.name', $name)
           ->get();
    
       $acceptLanguage = request()->header('Accept-Language');
       $data = [];  
       foreach ($category as $cat) {
           foreach ($cat->subCategories as $sub) {
               $translations = $sub->getTranslationsArray();
               if (isset($translations[$acceptLanguage])) {
                   $selectedSubcategory = $translations[$acceptLanguage];
                   $data[] = [
                      'category' => $name,
                      'Sub_category' => $selectedSubcategory,
                      'id' => $sub->id
                   ];
               }
           }
       }
    
       return $this->indexResponse($data);
    }
}
