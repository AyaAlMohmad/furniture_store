<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Bages\AboutController;
use App\Http\Controllers\Api\Bages\CareerController;
use App\Http\Controllers\Api\Bages\ContactController;
use App\Http\Controllers\Api\Bages\DataPolicyController;
use App\Http\Controllers\Api\Bages\DesignServiceController;
use App\Http\Controllers\Api\Bages\FaqeController;
use App\Http\Controllers\Api\Bages\HistoryController;
use App\Http\Controllers\Api\Bages\InvestorController;
use App\Http\Controllers\Api\Bages\PrivacyController;
use App\Http\Controllers\Api\Bages\ProjectController;
use App\Http\Controllers\Api\Bages\SocialController;
use App\Http\Controllers\Api\Bages\SolutionController;
use App\Http\Controllers\Api\Bages\TradeController;
use App\Http\Controllers\Api\Bages\ValueController;
use App\Http\Controllers\Api\Bages\VillaController;
use App\Http\Controllers\Api\product\CategoryController;
use App\Http\Controllers\Api\product\OrderController;
use App\Http\Controllers\Api\product\ProductController;
use App\Http\Controllers\Api\product\SubCategoryController;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    // 'middleware' => 'auth:sanctum',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
  
});



Route::group([
    'middleware' => 'auth:sanctum',
], function ($router) {
Route::get('/user_profile', [AuthController::class, 'userProfile']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('order/store',[OrderController::class, 'store']);
Route::get('orders',[OrderController::class, 'index']);

});




Route::get('Image_Video',[ProductController::class, 'imageVideo']);
Route::get('categories',[CategoryController::class, 'index']);
Route::get('sub_categories',[SubCategoryController::class, 'index']);
Route::get('sub_category_office_furniture',[CategoryController::class, 'showoffic']);
Route::get('sub_category_School_furniture',[CategoryController::class, 'showschoole']);
Route::get('sub_category_outdoor_furniture',[CategoryController::class, 'showoutdoor']);
Route::get('sub_category_hospitality_furniture',[CategoryController::class, 'showhospitality']);
Route::get('catalog',[ProductController::class, 'cataloge']);
Route::get('produts/{id}',[ProductController::class, 'index']);
Route::get('produt/{id}',[ProductController::class, 'show']);
Route::get('/search', [ProductController::class, 'search']);
Route::get('faqs',[FaqeController::class, 'index']);
Route::get('values',[ValueController::class, 'index']);
Route::get('histories',[HistoryController::class, 'index']);
Route::get('trades',[TradeController::class, 'index']);
Route::get('careers',[CareerController::class, 'index']);
Route::post('career/store',[CareerController::class, 'store']);
Route::get('DataPolicy',[DataPolicyController::class, 'index']);
Route::get('DesignService',[DesignServiceController::class, 'index']); 
Route::get('Investors',[InvestorController::class, 'index']);
Route::get('CookiePolicy',[PrivacyController::class, 'index']);
Route::get('Project',[ProjectController::class, 'index']);
Route::get('Project/{id}',[ProjectController::class, 'show']);
Route::get('Villa',[VillaController::class, 'index']);
Route::get('Villa/{id}',[VillaController::class, 'show']);
Route::get('Social',[SocialController::class, 'index']);
Route::get('Contact',[ContactController::class, 'index']);
Route::get('About',[AboutController::class, 'index']);
Route::get('solutions',[SolutionController::class, 'index']);
Route::get('solutions',[SolutionController::class, 'index']);



Route::get('products/material/{id}',[ProductController::class, 'indexWithMaterial']);
Route::get('products/desc/{id}',[ProductController::class, 'indexWithDesc']);
Route::get('products/asc/{id}',[ProductController::class, 'indexWithAsc']);

// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('optimize:clear');
//     return '<h1>Cache cleared</h1>';
// });
