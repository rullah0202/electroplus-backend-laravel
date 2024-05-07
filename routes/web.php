<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get('/', function () {
    return view('admin.admin_login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard
Route::get('admin/login', [AdminController::class, 'AdminLogin']);

Route::middleware('auth','role:admin')->group(function () {
    Route::get('admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class,'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class,'AdminUpdatePassword'])->name('admin.update.password');
    Route::delete('/admin/account/delete', [AdminController::class,'AdminAccountDelete'])->name('admin.account.delete');
});
// Brand All Route
Route::middleware('auth','role:admin')->group(function () {
    Route::controller(BrandController::class)->group(function () {
        Route::get('/all/brand' , 'AllBrand')->name('all.brand');
        Route::get('/add/brand' , 'AddBrand')->name('add.brand');
        Route::post('/store/brand' , 'StoreBrand')->name('store.brand');
        Route::get('/edit/brand/{id}' , 'EditBrand')->name('edit.brand');
        Route::post('/update/brand' , 'UpdateBrand')->name('update.brand');
        Route::get('/delete/brand/{id}' , 'DeleteBrand')->name('delete.brand');
    });
});

// Category All Route
Route::controller(CategoryController::class)->group(function(){
    Route::get('/all/category' , 'AllCategory')->name('all.category');
    Route::get('/add/category' , 'AddCategory')->name('add.category');
    Route::post('/store/category' , 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}' , 'EditCategory')->name('edit.category');
    Route::post('/update/category' , 'UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}' , 'DeleteCategory')->name('delete.category');
});

 // Sub Category All Route 
 Route::controller(SubCategoryController::class)->group(function(){
    Route::get('/all/subcategory' , 'AllSubCategory')->name('all.subcategory');
    Route::get('/add/subcategory' , 'AddSubCategory')->name('add.subcategory');
    Route::post('/store/subcategory' , 'StoreSubCategory')->name('store.subcategory');
    Route::get('/edit/subcategory/{id}' , 'EditSubCategory')->name('edit.subcategory');
    Route::post('/update/subcategory/{id}' , 'UpdateSubCategory')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}' , 'DeleteSubCategory')->name('delete.subcategory');
    Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');
});

 // Product All Route 
 Route::controller(ProductController::class)->group(function(){
    Route::get('/all/product' , 'AllProduct')->name('all.product');
    Route::get('/add/product' , 'AddProduct')->name('add.product');
    Route::post('/store/product' , 'StoreProduct')->name('store.product');
    Route::get('/edit/product/{id}' , 'EditProduct')->name('edit.product');
    Route::post('/update/product' , 'UpdateProduct')->name('update.product');
    Route::post('/update/product/thumbnail' , 'UpdateProductThumbnail')->name('update.product.thumbnail');
    Route::post('/update/product/multiimage' , 'UpdateProductMultiimage')->name('update.product.multiimage');
    Route::get('/product/multiimg/delete/{id}' , 'MulitImageDelelte')->name('product.multiimg.delete');

    Route::get('/product/inactive/{id}' , 'ProductInactive')->name('product.inactive');
    Route::get('/product/active/{id}' , 'ProductActive')->name('product.active');
    Route::get('/delete/product/{id}' , 'ProductDelete')->name('delete.product');

    // For Product Stock
     Route::get('/product/stock' , 'ProductStock')->name('product.stock');
    

});

 // Slider All Route 
 Route::controller(SliderController::class)->group(function(){
    Route::get('/all/slider' , 'AllSlider')->name('all.slider');
    Route::get('/add/slider' , 'AddSlider')->name('add.slider');
    Route::post('/store/slider' , 'StoreSlider')->name('store.slider');
    Route::get('/edit/slider/{id}' , 'EditSlider')->name('edit.slider');
    Route::post('/update/slider' , 'UpdateSlider')->name('update.slider');
    Route::get('/delete/slider/{id}' , 'DeleteSlider')->name('delete.slider');

});

// Vendor Dashboard
Route::middleware('auth','role:vendor')->group(function () {
    Route::get('vendor/dashboard',[VendorController::class,'VendorDashboard'])->name('vendor.dashboard');
});

require __DIR__.'/auth.php';
