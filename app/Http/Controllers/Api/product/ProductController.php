<?php

namespace App\Http\Controllers\Api\product;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\Image;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\Video;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $products = Product::where('sub_category_id', $id)->get();

        $data = [];

        foreach ($products as $product) {
            $images = [];
            $acceptLanguage = request()->header('Accept-Language');
            $category = $product->subCategory->category->getTranslationsArray();
            $sub_category = $product->subCategory->getTranslationsArray();

            $translations = $product->getTranslationsArray();

            $image_main = '/images/product/' . $product->image_main;

            if (isset($translations[$acceptLanguage])) {
                $selectedTranslation = $translations[$acceptLanguage];
                $selectedSub_category = $sub_category[$acceptLanguage];
                $selectedcategory = $category[$acceptLanguage];
            }

            $data[] = [
                'id' => $product->id,
                'category' => $selectedcategory,
                'sub_category' => $selectedSub_category,
                'translation' => $selectedTranslation,
                'image_main' => $image_main,
            ];
        }

        return $this->indexResponse($data);
    }





    public function indexWithMaterial(Request $request, $id)
    {
        $products = Product::query()
            ->join('product_translations', function ($join) use ($request, $id) {
                $join->on('products.id', '=', 'product_translations.product_id')
                    ->where('product_translations.material', 'like', '%' . $request->material . '%')
                    ->where('products.sub_category_id', $id);
            })
            ->select('products.*')
            ->get();
        $data = [];

        foreach ($products as $product) {
            $images = [];
            $acceptLanguage = request()->header('Accept-Language');
            $category = $product->subCategory->category->getTranslationsArray();
            $sub_category = $product->subCategory->getTranslationsArray();

            $translations = $product->getTranslationsArray();

            $image_main = '/images/product/' . $product->image_main;


            if (isset($translations[$acceptLanguage])) {
                $selectedTranslation = $translations[$acceptLanguage];
                $selectedSub_category = $sub_category[$acceptLanguage];
                $selectedcategory = $category[$acceptLanguage];
            }

            $data[] = [
                'id' => $product->id,
                'category' => $selectedcategory,
                'sub_category' => $selectedSub_category,
                'translation' => $selectedTranslation,
                'image_main' => $image_main,
            ];
        }

        return $this->indexResponse($data);
    }



    public function indexWithDesc($id)
    {
        $products = Product::where('sub_category_id', $id)->orderBy('created_at', 'desc')->get();
        $data = [];

        foreach ($products as $product) {
            $images = [];
            $acceptLanguage = request()->header('Accept-Language');
            $category = $product->subCategory->category->getTranslationsArray();
            $sub_category = $product->subCategory->getTranslationsArray();

            $translations = $product->getTranslationsArray();

            $image_main = '/images/product/' . $product->image_main;
            if (isset($translations[$acceptLanguage])) {
                $selectedTranslation = $translations[$acceptLanguage];
                $selectedSub_category = $sub_category[$acceptLanguage];
                $selectedcategory = $category[$acceptLanguage];
            }

            $data[] = [
                'id' => $product->id,
                'category' => $selectedcategory,
                'sub_category' => $selectedSub_category,
                'translation' => $selectedTranslation,
                'image_main' => $image_main,
            ];
        }

        return $this->indexResponse($data);
    }





    public function indexWithAsc($id)
    {
        $products = Product::where('sub_category_id', $id)->orderBy('created_at', 'asc')->get();
        $data = [];

        foreach ($products as $product) {
            $images = [];
            $acceptLanguage = request()->header('Accept-Language');
            $category = $product->subCategory->category->getTranslationsArray();
            $sub_category = $product->subCategory->getTranslationsArray();

            $translations = $product->getTranslationsArray();
            $image_main = '/images/product/' . $product->image_main;
            if (isset($translations[$acceptLanguage])) {
                $selectedTranslation = $translations[$acceptLanguage];
                $selectedSub_category = $sub_category[$acceptLanguage];
                $selectedcategory = $category[$acceptLanguage];
            }

            $data[] = [
                'id' => $product->id,
                'category' => $selectedcategory,
                'sub_category' => $selectedSub_category,
                'translation' => $selectedTranslation,
                'image_main' => $image_main,
            ];
        }

        return $this->indexResponse($data);
    }

    public function cataloge()
    {
        $products = Product::all();
        $catalgs = Catalog::all();
        $data = [];
        $catalog = [];
        $images = [];
        $color = [];
        foreach ($products as $product) {
            $acceptLanguage = request()->header('Accept-Language');
            $sub_category = $product->subCategory->getTranslationsArray();
            $category = $product->subCategory->category->getTranslationsArray();
            $translations = $product->getTranslationsArray();
            $image_main = 'images/product/' . $product->image_main;
            if (isset($translations[$acceptLanguage])) {
                $selectedTranslation = $translations[$acceptLanguage];
                $selectedSub_category = $sub_category[$acceptLanguage];
                $selectedcategory = $category[$acceptLanguage];
            }


            $data[] = [
                'id' => $product->id,
                'category' => $selectedcategory,
                'sub_category' => $selectedSub_category,
                'translation' => $selectedTranslation,

                'image_main' => $image_main,
            ];
        }
        foreach ($catalgs as $catalg) {
            $acceptLanguage = request()->header('Accept-Language');
            $translation = $catalg->getTranslationsArray();
            $pdf = 'pdfs/catalog/' . $catalg->pdf;
            if (isset($translation[$acceptLanguage])) {
                $selectedTranslation = $translation[$acceptLanguage];
            }
            $catalog[] = [
                'translation' => $selectedTranslation,
                'pdf' => $pdf
            ];
        }
        $allData[] = [
            'all_products' => $data,
            'catalog' => $catalog
        ];
        return $this->indexResponse($allData);
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $Images = ImageProduct::where('product_id', $product->id)->get();

        $images = [];
        $color = [];
        $image_main = 'images/product/' . $product->image_main;
        $price = $product->price;
        $acceptLanguage = request()->header('Accept-Language');
        $sub_category = $product->subCategory->getTranslationsArray();
        $category = $product->subCategory->category->getTranslationsArray();
        $translations = $product->getTranslationsArray();
        foreach ($Images as $image) {
            $images[] = 'images/product/' . $image->image;
        }
        if (isset($translations[$acceptLanguage])) {
            $selectedTranslation = $translations[$acceptLanguage];
            $selectedSub_category = $sub_category[$acceptLanguage];
            $selectedcategory = $category[$acceptLanguage];
        }
        foreach ($product->colors as $individualColor) {
            $imag = 'images/color/' . $individualColor->image;
            $translatedColor = [
                'image' => $imag,
                'translation' => $individualColor->getTranslationsArray()
            ];
            $color[] = $translatedColor;
        }


        $data = [
            'id' => $product->id,
            'category_id' => $product->subCategory->category->id,

            'sub_category_id' => $product->sub_category_id,
            'category' => $selectedcategory,
            'sub_category' => $selectedSub_category,
            'translation' => $selectedTranslation,
            'image_main' => $image_main,
            'images' => $images,
            'color' => $color
        ];
        return $this->showResponse($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = request('keyword');

        $products = Product::query()
            ->join('product_translations', 'products.id', '=', 'product_translations.product_id')
            ->where('product_translations.name', 'like', '%' . $keyword . '%')
            ->orWhere('product_translations.description', 'like', '%' . $keyword . '%')
            ->orWhere('product_translations.material', 'like', '%' . $keyword . '%')
            ->get();

        $data = [];

        $images = [];
        $color = [];
        foreach ($products as $product) {
            $price = $product->price;
            $acceptLanguage = request()->header('Accept-Language');
            $sub_category = $product->subCategory->getTranslationsArray();
            $category = $product->subCategory->category->getTranslationsArray();
            $translations = $product->getTranslationsArray();
            $image_main = 'images/product/' . $product->image_main;
            if (isset($translations[$acceptLanguage])) {
                $selectedTranslation = $translations[$acceptLanguage];
                $selectedSub_category = $sub_category[$acceptLanguage];
                $selectedcategory = $category[$acceptLanguage];
            }


            $data[] = [
                'id' => $product->id,
                'price' => $price,
                'category' => $selectedcategory,
                'sub_category' => $selectedSub_category,
                'translation' => $selectedTranslation,
                'image_main' => $image_main,
            ];
        }
        return $this->indexResponse($data);
    }
    public function imageVideo()
    {
        $image = Image::all();
        $video = Video::all();
        foreach ($image as $data) {
            $images[] = 'images/slider/' . $data->image;
        }
        foreach ($video as $item) {
            $videos[] = 'videos/slider/' . $item->video;
        }
        $data = [
            'image' => $images,
            'video' => $videos
        ];
        return $this->indexResponse($data);
    }
}
