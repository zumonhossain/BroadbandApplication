<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerInfoController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\ServiceTypeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




// ================= Admin Routes ======================
Route::group(['prefix'=>'admin'], function(){

    // Admin Routes
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin');

    //Banner routes
    Route::get('banner/new-banner-form', [BannerInfoController::class, 'addNewBannerInfoForm'])->name('banner_new_form');
    Route::post('banner/insert-banner-form', [BannerInfoController::class, 'insertBannerInfoFormSubmit'])->name('banner_insert_form');
    Route::get('banner/edit-banner/{id}', [BannerInfoController::class, 'editBannerInfoForm'])->name('banner_edit_form');
    Route::post('banner/update-banner', [BannerInfoController::class, 'updateBannerInfoFormSubmit'])->name('banner_update_form');
    Route::post('banner/delete-banner', [BannerInfoController::class, 'deleteBannerInformationFormSubmit'])->name('banner_delete_form');

    // Company Profile
    Route::get('company/profile-form', [CompanyInfoController::class, 'CompanyProfileInfoForm'])->name('company_profile_form');
    Route::post('company/update-profile', [CompanyInfoController::class, 'updateCompanyProfileInfoFormSubmit'])->name('company_profile_update_form');

    // Service Type
    Route::get('serviceType/new-service-type-form', [ServiceTypeController::class, 'addNewServiceTypeForm'])->name('service_type_new_form');
    Route::post('serviceType/insert-new-service-type', [ServiceTypeController::class, 'insertServiceTypeInfoFormSubmit'])->name('service_type_insert_form');
    Route::get('serviceType/edit-service-type/{id}', [ServiceTypeController::class, 'editServiceTypeInfoForm'])->name('service_type_edit_form');
    Route::post('serviceType/update-service-type', [ServiceTypeController::class, 'updateServiceTypeInfoFormSubmit'])->name('service_type_update_form');
    Route::post('serviceType/delete-service-type', [ServiceTypeController::class, 'deleteServiceTypeInfoFormSubmit'])->name('service_type_delete_form');

});




require __DIR__.'/auth.php';
