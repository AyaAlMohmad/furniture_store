<?php

use App\Http\Controllers\Dashboard\AboutController;
use App\Http\Controllers\Dashboard\CareerController;
use App\Http\Controllers\Dashboard\CatalogController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ColorController;
use App\Http\Controllers\Dashboard\ContactController;
use App\Http\Controllers\Dashboard\DashController;
use App\Http\Controllers\Dashboard\DataPolicyController;
use App\Http\Controllers\Dashboard\DesignerController;
use App\Http\Controllers\Dashboard\DesignServiceController;
use App\Http\Controllers\Dashboard\FaqeController;
use App\Http\Controllers\Dashboard\HistoryController;
use App\Http\Controllers\Dashboard\ImageVideoController;
use App\Http\Controllers\Dashboard\InvestorController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\OrderJobController;
use App\Http\Controllers\Dashboard\PrivacyController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\RoleUserController;
use App\Http\Controllers\Dashboard\SocialController;
use App\Http\Controllers\Dashboard\SolutionController;
use App\Http\Controllers\Dashboard\SubCategoryController;
use App\Http\Controllers\Dashboard\TradeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ValueController;
use App\Http\Controllers\Dashboard\VillaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LocaleController@switchLang']); 

Route::prefix('dash/')->middleware(['auth','localized'])->group(function () {
    Route::get('/', [DashController::class, 'index'])->name('dash.index');
   
   
   
    Route::resource('abouts', AboutController::class);
    Route::get('SoftAbouts', [AboutController::class, 'recycleBin'])->name('abouts.soft');
    Route::get('abouts/finldelete/{id}', [AboutController::class, 'finalDelete'])->name('abouts.finaldelete');
    Route::get('abouts/restore/{id}', [AboutController::class, 'restore'])->name('abouts.restore');


    Route::resource('villas', VillaController::class);
    Route::get('SoftVillas', [VillaController::class, 'recycleBin'])->name('villas.soft');
    Route::get('villas/finldelete/{id}', [VillaController::class, 'finalDelete'])->name('villas.finaldelete');
    Route::get('villas/restore/{id}', [VillaController::class, 'restore'])->name('villas.restore');



    Route::resource('categories', CategoryController::class);
    Route::get('Softcategories', [CategoryController::class, 'recycleBin'])->name('categories.soft');
    Route::get('categories/finldelete/{id}', [CategoryController::class, 'finalDelete'])->name('categories.finaldelete');
    Route::get('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');

    
    Route::resource('sub_categories', SubCategoryController::class);
    Route::get('Softsub_categories', [SubCategoryController::class, 'recycleBin'])->name('sub_categories.soft');
    Route::get('sub_categories/finldelete/{id}', [SubCategoryController::class, 'finalDelete'])->name('sub_categories.finaldelete');
    Route::get('sub_categories/restore/{id}', [SubCategoryController::class, 'restore'])->name('sub_categories.restore');



    Route::resource('products', ProductController::class);
    Route::get('Softproducts', [ProductController::class, 'recycleBin'])->name('products.soft');
    Route::get('products/finldelete/{id}', [ProductController::class, 'finalDelete'])->name('products.finaldelete');
    Route::get('products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');
    
    Route::resource('designers', DesignerController::class);
    Route::get('Softdesigners', [DesignerController::class, 'recycleBin'])->name('designers.soft');
    Route::get('designers/finldelete/{id}', [DesignerController::class, 'finalDelete'])->name('designers.finaldelete');
    Route::get('designers/restore/{id}', [DesignerController::class, 'restore'])->name('designers.restore');
    


    Route::resource('colors', ColorController::class);
    Route::get('Softcolors', [ColorController::class, 'recycleBin'])->name('colors.soft');
    Route::get('colors/finldelete/{id}', [ColorController::class, 'finalDelete'])->name('colors.finaldelete');
    Route::get('colors/restore/{id}', [ColorController::class, 'restore'])->name('colors.restore');
    

    Route::resource('socials', SocialController::class);
    Route::get('Softsocials', [SocialController::class, 'recycleBin'])->name('socials.soft');
    Route::get('socials/finldelete/{id}', [SocialController::class, 'finalDelete'])->name('socials.finaldelete');
    Route::get('socials/restore/{id}', [SocialController::class, 'restore'])->name('socials.restore');
    

    Route::resource('roles', RoleController::class);
    Route::get('Softroles', [RoleController::class, 'recycleBin'])->name('roles.soft');
    Route::get('roles/finldelete/{id}', [RoleController::class, 'finalDelete'])->name('roles.finaldelete');
    Route::get('roles/restore/{id}', [RoleController::class, 'restore'])->name('roles.restore');
    
    Route::resource('role_users', RoleUserController::class);


    Route::resource('users', UserController::class);
    Route::get('Softusers', [UserController::class, 'recycleBin'])->name('users.soft');
    Route::get('users/finldelete/{id}', [UserController::class, 'finalDelete'])->name('users.finaldelete');
    Route::get('users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
    


    Route::resource('contacts', ContactController::class);
    Route::get('Softcontacts', [ContactController::class, 'recycleBin'])->name('contacts.soft');
    Route::get('contacts/finldelete/{id}', [ContactController::class, 'finalDelete'])->name('contacts.finaldelete');
    Route::get('contacts/restore/{id}', [ContactController::class, 'restore'])->name('contacts.restore');
    

    Route::resource('faqes', FaqeController::class);
    Route::get('Softfaqes', [FaqeController::class, 'recycleBin'])->name('faqes.soft');
    Route::get('faqes/finldelete/{id}', [FaqeController::class, 'finalDelete'])->name('faqes.finaldelete');
    Route::get('faqes/restore/{id}', [FaqeController::class, 'restore'])->name('faqes.restore');
    
    Route::resource('trades', TradeController::class);
    Route::get('Softtrades', [TradeController::class, 'recycleBin'])->name('trades.soft');
    Route::get('trades/finldelete/{id}', [TradeController::class, 'finalDelete'])->name('trades.finaldelete');
    Route::get('trades/restore/{id}', [TradeController::class, 'restore'])->name('trades.restore');
    
    Route::resource('data_policies', DataPolicyController::class);
    Route::get('Softdata_policies', [DataPolicyController::class, 'recycleBin'])->name('data_policies.soft');
    Route::get('data_policies/finldelete/{id}', [DataPolicyController::class, 'finalDelete'])->name('data_policies.finaldelete');
    Route::get('data_policies/restore/{id}', [DataPolicyController::class, 'restore'])->name('data_policies.restore');
    
    Route::resource('privacies', PrivacyController::class);
    Route::get('Softprivacies', [PrivacyController::class, 'recycleBin'])->name('privacies.soft');
    Route::get('privacies/finldelete/{id}', [PrivacyController::class, 'finalDelete'])->name('privacies.finaldelete');
    Route::get('privacies/restore/{id}', [PrivacyController::class, 'restore'])->name('privacies.restore');
    

    Route::resource('investors', InvestorController::class);
    Route::get('Softinvestors', [InvestorController::class, 'recycleBin'])->name('investors.soft');
    Route::get('investors/finldelete/{id}', [InvestorController::class, 'finalDelete'])->name('investors.finaldelete');
    Route::get('investors/restore/{id}', [InvestorController::class, 'restore'])->name('investors.restore');
    
    Route::resource('design_services', DesignServiceController::class);
    Route::get('Softdesign_services', [DesignServiceController::class, 'recycleBin'])->name('design_services.soft');
    Route::get('design_services/finldelete/{id}', [DesignServiceController::class, 'finalDelete'])->name('design_services.finaldelete');
    Route::get('design_services/restore/{id}', [DesignServiceController::class, 'restore'])->name('design_services.restore');
    



    Route::resource('values', ValueController::class);
    Route::get('Softvalues', [ValueController::class, 'recycleBin'])->name('values.soft');
    Route::get('values/finldelete/{id}', [ValueController::class, 'finalDelete'])->name('values.finaldelete');
    Route::get('values/restore/{id}', [ValueController::class, 'restore'])->name('values.restore');
    
    Route::resource('solutions', SolutionController::class);
    Route::get('Softsolutions', [SolutionController::class, 'recycleBin'])->name('solutions.soft');
    Route::get('solutions/finldelete/{id}', [SolutionController::class, 'finalDelete'])->name('solutions.finaldelete');
    Route::get('solutions/restore/{id}', [SolutionController::class, 'restore'])->name('solutions.restore');
  
    Route::resource('histories', HistoryController::class);
    Route::get('Softhistories', [HistoryController::class, 'recycleBin'])->name('histories.soft');
    Route::get('histories/finldelete/{id}', [HistoryController::class, 'finalDelete'])->name('histories.finaldelete');
    Route::get('histories/restore/{id}', [HistoryController::class, 'restore'])->name('histories.restore');
    
    Route::resource('projects', ProjectController::class);
    Route::get('Softprojects', [ProjectController::class, 'recycleBin'])->name('projects.soft');
    Route::get('projects/finldelete/{id}', [ProjectController::class, 'finalDelete'])->name('projects.finaldelete');
    Route::get('projects/restore/{id}', [ProjectController::class, 'restore'])->name('projects.restore');
    

    Route::resource('catalogs', CatalogController::class);
    Route::get('Softcatalogs', [CatalogController::class, 'recycleBin'])->name('catalogs.soft');
    Route::get('catalogs/finldelete/{id}', [CatalogController::class, 'finalDelete'])->name('catalogs.finaldelete');
    Route::get('catalogs/restore/{id}', [CatalogController::class, 'restore'])->name('catalogs.restore');
    
    Route::resource('careers', CareerController::class);
    Route::get('Softcareers', [CareerController::class, 'recycleBin'])->name('careers.soft');
    Route::get('careers/finldelete/{id}', [CareerController::class, 'finalDelete'])->name('careers.finaldelete');
    Route::get('careers/restore/{id}', [CareerController::class, 'restore'])->name('careers.restore');
    
    Route::resource('order_jobs', OrderJobController::class);
    Route::get('Softorder_jobs', [OrderJobController::class, 'recycleBin'])->name('order_jobs.soft');
    Route::get('order_jobs/finldelete/{id}', [OrderJobController::class, 'finalDelete'])->name('order_jobs.finaldelete');
    Route::get('order_jobs/restore/{id}', [OrderJobController::class, 'restore'])->name('order_jobs.restore');
    
    
    Route::resource('orders', OrderController::class);
  

    Route::get('ImageVideos', [ImageVideoController::class,'index'])->name('image_videos.index');
    Route::get('Image/{id}', [ImageVideoController::class,'showImage'])->name('image.show');
    Route::get('Video/{id}', [ImageVideoController::class,'showVideo'])->name('video.show');
    Route::get('ImageVideos/create', [ImageVideoController::class,'create'])->name('image_videos.create');
    Route::post('ImageVideos', [ImageVideoController::class,'store'])->name('image_videos.store');
    Route::get('editImage/{id}', [ImageVideoController::class,'editImage'])->name('image.edit');
    Route::get('editVideo/{id}', [ImageVideoController::class,'editVideo'])->name('video.edit');
    Route::put('Image/update/{id}', [ImageVideoController::class,'updateImage'])->name('image.update');
    Route::put('Video/update/{id}', [ImageVideoController::class,'updateVideo'])->name('video.update');
    Route::delete('Image/{id}', [ImageVideoController::class,'destroyImage'])->name('image.destroy');
    Route::delete('Video/{id}', [ImageVideoController::class,'destroyVideo'])->name('video.destroy');
    Route::get('SoftImageVideos', [ImageVideoController::class,'recycleBin'])->name('image_videos.soft');
    Route::get('Image/restore/{id}', [ImageVideoController::class,'restoreImage'])->name('image.restore');
    Route::get('Video/restore/{id}', [ImageVideoController::class,'restoreVideo'])->name('video.restore');   
     Route::get('Image/finldelete/{id}', [ImageVideoController::class,'finalDeleteImage'])->name('image.finaldelete');
    Route::get('Video/finldelete/{id}', [ImageVideoController::class,'finalDeleteVideo'])->name('video.finaldelete');

});
