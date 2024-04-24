<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
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
    Route::post('/update/subcategory' , 'UpdateSubCategory')->name('update.subcategory');
    Route::get('/delete/subcategory/{id}' , 'DeleteSubCategory')->name('delete.subcategory');
    Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');
});

// Vendor Dashboard
Route::middleware('auth','role:vendor')->group(function () {
    Route::get('vendor/dashboard',[VendorController::class,'VendorDashboard'])->name('vendor.dashboard');
});

require __DIR__.'/auth.php';
