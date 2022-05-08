<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerInfoController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\PackageInfoController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;

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

    // Package Info
    Route::get('packageInfo/new-package-info-form', [PackageInfoController::class, 'addNewPackageInfoForm'])->name('package_info_new_form');
    Route::post('packageInfo/insert-new-package-info', [PackageInfoController::class, 'insertPackageInfoFormSubmit'])->name('package_info_insert_form');
    Route::get('packageInfo/edit-package-info/{id}', [PackageInfoController::class, 'editPackageInfoForm'])->name('package_info_edit_form');
    Route::post('packageInfo/update-package-info', [PackageInfoController::class, 'updatePackageInfoFormSubmit'])->name('package_info_update_form');
    Route::post('packageInfo/delete-package-info', [PackageInfoController::class, 'deletePackageInfoFormSubmit'])->name('package_info_delete_form');

    // Division
    Route::get('division/new-division-info-form', [DivisionController::class, 'addNewDivisionInfoForm'])->name('division_new_form');
    Route::post('division/insert-new-division-info', [DivisionController::class, 'insertDivisionInfoFormSubmit'])->name('division_insert_form');
    Route::get('division/edit-division-info/{id}', [DivisionController::class, 'editDivisionInfoForm'])->name('division_edit_form');
    Route::post('division/update-division-info', [DivisionController::class, 'updateDivisionInfoFormSubmit'])->name('division_update_form');
    Route::post('division/delete-division-info', [DivisionController::class, 'deleteDivisionInfoFormSubmit'])->name('division_delete_form');

    // District
    Route::get('district/new-district-form', [DistrictController::class, 'addNewDistrictForm'])->name('district_new_form');
    Route::post('district/insert-new-district', [DistrictController::class, 'insertDistrictInfoFormSubmit'])->name('district_insert_form');
    Route::get('district/edit-district/{id}', [DistrictController::class, 'editDistrictInfoForm'])->name('district_edit_form');
    Route::post('district/update-district', [DistrictController::class, 'updateDistrictInfoFormSubmit'])->name('district_update_form');
    Route::post('district/delete-district', [DistrictController::class, 'deleteDistrictInfoFormSubmit'])->name('district_delete_form');

});




require __DIR__.'/auth.php';
