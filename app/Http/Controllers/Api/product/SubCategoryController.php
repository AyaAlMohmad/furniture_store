<?php

namespace App\Http\Controllers\Api\product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $categories = Category::all();
        $data = [];

        foreach ($categories as $category) {
            $id = $category->id;
            $acceptLanguage = request()->header('Accept-Language');

           $translations = $category->getTranslationsArray();
            $sub_category = [];

            foreach ($category->subCategories as $subCategory) {
                $id = $subCategory->id;
                $images  = 'images/subcategory/' . $subCategory->image;
                $translatedsubCategory = $subCategory->getTranslationsArray();
                $selectedcategory = isset($translatedsubCategory[$acceptLanguage])
                    ? $translatedsubCategory[$acceptLanguage]
                    : null;

                if ($selectedcategory) {
                    $sub_category[] = ['id' => $id, 'sub_category' => $selectedcategory,
                    'image' => $images,];
                }
            }

            $selectedTranslation = isset($translations[$acceptLanguage])
                ? $translations[$acceptLanguage]
                : null;

            $data[] = [
                'id' => $id,
                'Category' => $selectedTranslation,
                'sub_category' => $sub_category,
      

            ];
        }

        return $this->indexResponse($data);
    }


   

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
