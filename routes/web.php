<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerInfoController;
use App\Http\Controllers\Admin\CompanyInfoController;
use App\Http\Controllers\Admin\ServiceTypeController;
use App\Http\Controllers\Admin\PackageInfoController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\DistrictController;
use App\Http\Controllers\Admin\UpazilaController;
use App\Http\Controllers\Admin\UnionController;
use App\Http\Controllers\Admin\ServiceAreaController;
use App\Http\Controllers\Admin\ServiceSubAreaController;
use App\Http\Controllers\Admin\DailyCostController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PaymentInfoController;
use App\Http\Controllers\Admin\ProductPurchaseController;

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
    Route::get('division/new-division-form', [DivisionController::class, 'addNewDivisionInfoForm'])->name('division_new_form');
    Route::post('division/insert-new-division', [DivisionController::class, 'insertDivisionInfoFormSubmit'])->name('division_insert_form');
    Route::get('division/edit-division/{id}', [DivisionController::class, 'editDivisionInfoForm'])->name('division_edit_form');
    Route::post('division/update-division', [DivisionController::class, 'updateDivisionInfoFormSubmit'])->name('division_update_form');
    Route::post('division/delete-division', [DivisionController::class, 'deleteDivisionInfoFormSubmit'])->name('division_delete_form');

    // District
    Route::get('district/new-district-form', [DistrictController::class, 'addNewDistrictForm'])->name('district_new_form');
    Route::post('district/insert-new-district', [DistrictController::class, 'insertDistrictInfoFormSubmit'])->name('district_insert_form');
    Route::get('district/edit-district/{id}', [DistrictController::class, 'editDistrictInfoForm'])->name('district_edit_form');
    Route::post('district/update-district', [DistrictController::class, 'updateDistrictInfoFormSubmit'])->name('district_update_form');
    Route::post('district/delete-district', [DistrictController::class, 'deleteDistrictInfoFormSubmit'])->name('district_delete_form');

    // Upazila
    Route::get('upazila/new-upazila-form', [UpazilaController::class, 'addNewUpazilaForm'])->name('upazila_new_form');
    Route::post('upazila/insert-new-upazila', [UpazilaController::class, 'insertUpazilaInfoFormSubmit'])->name('upazila_insert_form');
    Route::get('upazila/edit-upazila/{id}', [UpazilaController::class, 'editUpazilaInfoForm'])->name('upazila_edit_form');
    Route::post('upazila/update-upazila', [UpazilaController::class, 'updateUpazilaInfoFormSubmit'])->name('upazila_update_form');
    Route::post('upazila/delete-upazila', [UpazilaController::class, 'deleteUpazilaInfoFormSubmit'])->name('upazila_delete_form');

    // Union
    Route::get('union/new-union-form', [UnionController::class, 'addNewUnionForm'])->name('union_new_form');
    Route::post('union/insert-new-union', [UnionController::class, 'insertUnionInfoFormSubmit'])->name('union_insert_form');
    Route::get('union/edit-union/{id}', [UnionController::class, 'editUnionInfoForm'])->name('union_edit_form');
    Route::post('union/update-union', [UnionController::class, 'updateUnionInfoFormSubmit'])->name('union_update_form');
    Route::post('union/delete-union', [UnionController::class, 'deleteUnionInfoFormSubmit'])->name('union_delete_form');

    // Service Area
    Route::get('serviceArea/new-service-area-form', [ServiceAreaController::class, 'addNewServiceAreaForm'])->name('service_area_new_form');
    Route::post('serviceArea/insert-new-service-area', [ServiceAreaController::class, 'insertServiceAreaFormSubmit'])->name('service_area_insert_form');
    Route::get('serviceArea/edit-service-area/{id}', [ServiceAreaController::class, 'editServiceAreaForm'])->name('service_area_edit_form');
    Route::post('serviceArea/update-service-area', [ServiceAreaController::class, 'updateServiceAreaFormSubmit'])->name('service_area_update_form');
    Route::post('serviceArea/delete-service-area', [ServiceAreaController::class, 'deleteServiceAreaFormSubmit'])->name('service_area_delete_form');

    // Service Sub Area
    Route::get('serviceSubArea/new-service-sub-area-form', [ServiceSubAreaController::class, 'addNewServiceSubAreaForm'])->name('service_sub_area_new_form');
    Route::post('serviceSubArea/insert-new-service-sub-area', [ServiceSubAreaController::class, 'insertServiceSubAreaFormSubmit'])->name('service_sub_area_insert_form');
    Route::get('serviceSubArea/edit-service-sub-area/{id}', [ServiceSubAreaController::class, 'editServiceSubAreaForm'])->name('service_sub_area_edit_form');
    Route::post('serviceSubArea/update-service-sub-area', [ServiceSubAreaController::class, 'updateServiceSubAreaFormSubmit'])->name('service_sub_area_update_form');
    Route::post('serviceSubArea/delete-service-sub-area', [ServiceSubAreaController::class, 'deleteServiceSubAreaFormSubmit'])->name('service_sub_area_delete_form');

    // Daily Cost
    Route::get('admin/daily/cost/new-daily-cost-form', [DailyCostController::class, 'addNewDailyCostForm'])->name('daily_cost_new_form');
    Route::post('admin/daily/cost/insert-new-daily-cost', [DailyCostController::class, 'insertDailyCostFormSubmit'])->name('daily_cost_insert_form');
    Route::get('admin/daily/cost/edit-daily-cost/{id}', [DailyCostController::class, 'editDailyCostForm'])->name('daily_cost_edit_form');
    Route::post('admin/daily/cost/update-daily-cost', [DailyCostController::class, 'updateDailyCostFormSubmit'])->name('daily_cost_update_form');
    Route::post('admin/daily/cost/delete-daily-cost', [DailyCostController::class, 'deleteDailyCostFormSubmit'])->name('daily_cost_delete_form');

    // Customer
    Route::get('customer/new-customer-form', [CustomerController::class, 'addNewCustomerForm'])->name('customer_new_form');
    Route::post('customer/insert-new-customer', [CustomerController::class, 'insertCustomerFormSubmit'])->name('customer_insert_form');
    Route::get('customer/edit-customer/{id}', [CustomerController::class, 'editCustomerForm'])->name('customer_edit_form');
    Route::post('customer/update-customer', [CustomerController::class, 'updateCustomerFormSubmit'])->name('customer_update_form');
    Route::post('customer/delete-customer', [CustomerController::class, 'deleteCustomerFormSubmit'])->name('customer_delete_form');

    Route::post('admin/customer/search-customer', [CustomerController::class, 'searchCustomerInformation'])->name('search_customer_information');
    
    // Payment
    Route::get('payment/new-payment-form', [PaymentInfoController::class, 'addNewPaymentInfoForm'])->name('payment_new_form');
    Route::post('payment/insert-new-payment', [PaymentInfoController::class, 'insertPaymentInfoFormSubmit'])->name('payment_insert_form');
    Route::get('payment/edit-payment/{id}', [PaymentInfoController::class, 'editPaymentInfoForm'])->name('payment_edit_form');
    Route::post('payment/update-payment', [PaymentInfoController::class, 'updatePaymentInfoFormSubmit'])->name('payment_update_form');
    Route::post('payment/delete-payment', [PaymentInfoController::class, 'deletePaymentInfoFormSubmit'])->name('payment_delete_form');

    // ProductPurchase
    Route::get('product/purchase/new-product-purchase-form', [ProductPurchaseController::class, 'addNewProductPurchaseForm'])->name('product_purchase_new_form');
    Route::post('Product/purchase/insert-new-product-purchase', [ProductPurchaseController::class, 'insertProductPurchaseFormSubmit'])->name('product_purchase_insert_form');
    Route::get('product/purchase/edit-product-purchase/{id}', [ProductPurchaseController::class, 'editProductPurchaseForm'])->name('product_purchase_edit_form');
    Route::post('product/purchase/update-product-purchase', [ProductPurchaseController::class, 'updateProductPurchaseFormSubmit'])->name('product_purchase_update_form');
    Route::post('product/purchase/delete-product-purchase', [ProductPurchaseController::class, 'deleteProductPurchaseFormSubmit'])->name('product_purchase_delete_form');


});




require __DIR__.'/auth.php';
