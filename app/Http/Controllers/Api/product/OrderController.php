<?php

namespace App\Http\Controllers\Api\product;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $orders = Order::where('user_id',Auth::id())->get();
      
        $data=[];
        foreach($orders as $order){
          
         
            $images = []; 
            $acceptLanguage = request()->header('Accept-Language');
            $category = $order->product->subCategory->category->getTranslationsArray();
            $sub_category = $order->product->subCategory->getTranslationsArray();

            $translations = $order->product->getTranslationsArray();
            foreach ($order->product->images as $image) {
                $images[] = '/images/product/' . $image->image;
            }
            if (isset($translations[$acceptLanguage])) {
                $selectedTranslation = $translations[$acceptLanguage];
                $selectedSub_category = $sub_category[$acceptLanguage];
                $selectedcategory = $category[$acceptLanguage];
            }

            $data[] = [
                'id' => $order->product->id,
                'category' => $selectedcategory,
                'sub_category' => $selectedSub_category,
                'translation' => $selectedTranslation,
                'images' => $images,
            ];
        }
        
        return $this->indexResponse($data);
    }



     
    public function store($id)
    {
        $product = Product::where('id', $id)->first();
        $acceptLanguage = request()->header('Accept-Language');
        $translations = $product->getTranslationsArray();
        if (isset($translations[$acceptLanguage])) {


            $selectedproduct = $translations[$acceptLanguage];
        }
        $order = Order::create([
            'user_id' => Auth::id(),
            'product_id' => $id
        ]);
        if ($order) {

            $data = [
                'username' => Auth::user()->name,
                'product' => $selectedproduct['name'],

            ];
            return $this->storeResponse($data);
        }
        return $this->dontSaveResponse();
    }
}
