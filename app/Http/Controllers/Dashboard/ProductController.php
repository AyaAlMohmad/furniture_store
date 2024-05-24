<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Designer;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ProductController extends DashboardController
{

    public function __construct(Product $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit', 'recycleBin'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
    public function create()
    {
        $items = SubCategory::all();

        $colors = Color::all();
        return view('dashboard.pages.products.form', compact('colors', 'items'));
    }

    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    public function store(ProductRequest $request)
    {

        $image_main = request()->file('image_main');
        $image_mainName = time() . '.' . $image_main->extension();
        $image_main->move(public_path('images/product'), $image_mainName);
        $product = Product::create([

            'sub_category_id' => $request->sub_category_id,
            'image_main' => $image_mainName
        ]);

        if ($request->color_id) {
            foreach ($request->color_id as $colorId) {
                ColorProduct::create([
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                ]);
            }
        }
        if ($request->has('images')) {
            foreach ($request->images as $image) {

                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('images/product'), $imageName);

                $product->images()->create(['image' => $imageName]);
            }
        }


        foreach ($request->all() as $locale => $data) {
            if (is_array($data) && isset($data['name'])) {
                $product->translateOrNew($locale)->name = $data['name'];
            }
            if (is_array($data) && isset($data['material'])) {
                $product->translateOrNew($locale)->material = $data['material'];
            }

            if (is_array($data) && isset($data['description'])) {
                $product->translateOrNew($locale)->description = $data['description'];
            }
        }

        $product->save();
        session()->flash('success', 'The creation has been saved successfully');


        return redirect($this->index_route);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $items = SubCategory::all();

        $colors = Color::all();
        return view('dashboard.pages.products.edit', compact('product', 'colors', 'items'));
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(Request $request, Product $product)
    {
        $data = $request->except('images', 'color_id');

        if ($request->hasFile('image_main')) {
            $image_mainPath = public_path('images/product/' . $product->image_main);
            if (File::exists($image_mainPath)) {
                unlink($image_mainPath);
            }
        }

        if (request()->hasFile('image_main') && request('image_main') != '') {
            $image_main = $request->file('image_main');
            $image_mainName = time() . '.' . $image_main->extension();
            $image_main->move(public_path('images/product'), $image_mainName);

            $data['image_main'] = $image_mainName;
            $product->update($data);
        }
        $product->update($data);

        if (request()->hasFile('images') && request('images') != '') {

            if ($oldImages = ImageProduct::where('product_id', $product->id)->get()) {
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('images/product/' . $oldImage->image);
                    if (File::exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $oldImage->delete();
                }
            }
        }

        if (request()->hasFile('images') && request('images') != '') {

            foreach ($request->images as $image) {

                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('images/product'), $imageName);

                $product->images()->create(['image' => $imageName]);
            }
        }


        if (empty($request->color_id)) {
            $product->colors()->detach();
        }
        if ($request->color_id) {
            foreach ($request->color_id as $colorId) {
                $colorProduct = ColorProduct::where('product_id', $product->id)->first();
                if ($colorProduct) {
                    $colorProduct->update(['color_id' => $colorId]);
                } else {
                    ColorProduct::create([
                        'product_id' => $product->id,
                        'color_id' => $colorId,
                    ]);
                }
            }
        }


        session()->flash('success', 'The modifications were saved successfully');

        return redirect($this->index_route);
    }
}
