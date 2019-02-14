<?php

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

Route::get('/','frontend\frontendController@index')->name('home');

Route::get('/service','frontend\frontendController@serviceindex')->name('service');


Route::get('/repair1', function () {
    return view('frontend.service.repair1');
})->name('repair1');

Route::get('/repair2', function () {
    return view('frontend.service.repair2');
})->name('repair2');

Route::get('/repair3', function () {
    return view('frontend.service.repair3');
})->name('repair3');

Route::get('/repair4', function () {
    return view('frontend.service.repair4');
})->name('repair4');

Route::get('/repair5', function () {
    return view('frontend.service.repair5');
})->name('repair5');


/* Service provider Registration Route */

Route::get('/sp','frontend\frontendController@spIndex')->name('sp');

Route::get('/getInfo1', 'frontend\UserInformationController@getInfo1')->name('getInfo1');

Route::get('/getInfo2', 'frontend\UserInformationController@getInfo2')->name('getInfo2');

Route::get('/getInfo3', 'frontend\UserInformationController@getInfo3')->name('getInfo3');

Route::get('/getInfo4', 'frontend\UserInformationController@getInfo4')->name('getInfo4');

Route::get('/getInfo5', 'frontend\UserInformationController@getInfo5')->name('getInfo5');

Route::get('/viewForm', 'frontend\UserInformationController@viewForm')->name('viewForm');

Route::get('/regSuccess', 'frontend\UserInformationController@regSuccess')->name('regSuccess');

Route::post('/spUserRegister', 'frontend\RegisterUserController@store');

Route::post('/LoginCheck', 'frontend\RegisterUserController@LoginCheck');

Route::get('/logout', 'frontend\RegisterUserController@Logout')->name('logout');

Route::get('/changeLang', 'frontend\frontendController@changeLang')->name('changeLang');

Route::group(['middleware' => 'CheckSPLogin', 'namespace' => 'frontend'], function () {

    Route::get('/spAdmin', 'UserInformationController@spAdmin')->name('spAdmin');

    Route::post('/updateGetInfo1', 'UserInformationController@store');

    Route::post('/updateGetInfo2', 'UserInformationController@storeInfo2');

    Route::post('/updateGetInfo3', 'UserInformationController@storeInfo3');

    Route::post('/updateGetInfo4', 'UserInformationController@storeInfo4');

    Route::post('/updateGetInfo5', 'UserInformationController@storeInfo5');

    Route::post('/updateGetInfo6', 'UserInformationController@storeInfo6');

    /* Service provider Admin Panel Route */

    Route::get('/resourceCrud/{data?}', 'ServiceProviderController@resourceCrud')->name('resourceCrud');

    Route::post('/AddNewResource', 'ServiceProviderController@AddNewResource');

    Route::get('/deleteResource', 'ServiceProviderController@deleteResource');

    Route::get('/AddResource', 'ServiceProviderController@AddResource')->name('AddResource');

    Route::post('/AddDeleteResource', 'ServiceProviderController@AddDeleteResource');

    Route::post('/UpdateResource', 'ServiceProviderController@UpdateResource');

    Route::get('/spSchedule', 'ServiceProviderController@spSchedule')->name('spSchedule');

    Route::post('/TimeAddSchedule1', 'ServiceProviderController@TimeAddSchedule1');

    Route::post('/TimeAddSchedule2', 'ServiceProviderController@TimeAddSchedule2');

    Route::get('/spBusyDay/{data?}', 'ServiceProviderController@spBusyDay')->name('spBusyDay');

    Route::post('/BusyDayAdd', 'ServiceProviderController@BusyDayAdd');

    Route::post('/BusyDayUpdate', 'ServiceProviderController@BusyDayUpdate');

    Route::get('/spBusyDayDelete', 'ServiceProviderController@spBusyDayDelete');

    Route::get('/PersonalInformation/{data?}', 'RegisterUserController@PersonalInformation')->name('PersonalInformation');

    Route::post('/UpdateSpProfile', 'RegisterUserController@UpdateSpProfile');

    Route::get('/spTermsCondition/', 'ServiceProvider2Controller@spTermsCondition')->name('spTermsCondition');

    Route::get('/spHelp', 'ServiceProvider2Controller@spHelp')->name('spHelp');

    Route::get('/spAnnouncement', 'ServiceProvider2Controller@spAnnouncement')->name('spAnnouncement');

});

/*
|=========================================================================
| Web Backend Part Route
|=========================================================================
*/

Route::get('/admin', 'backend\AdminController@index');

Route::post('/AdminLoginCheck', 'backend\AdminController@LoginCheck');

Route::get('/AdminLogout', 'backend\AdminController@Logout')->name('AdminLogout');

Route::post('/AdminUserRegister', 'backend\AdminController@AdminUserRegister');

Route::group(['middleware' => 'CheckAdminLogin', 'namespace' => 'backend'], function () {

    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

    Route::get('/spApprove/{data?}', 'AdminController@spApprove')->name('spApprove');

    Route::get('/spNotApprove/{data?}', 'AdminController@spNotApprove')->name('spNotApprove');

    Route::get('/AdminSPUpdate', 'AdminController@AdminSPUpdate');

    Route::get('/termsCondition/{data?}', 'AdminController@termsCondition')->name('termsCondition');

    Route::post('/AddTermsCondition', 'AdminController@AddTermsCondition');

    Route::get('/DeleteTermsCon', 'AdminController@DeleteTermsCon');

    Route::post('/UpdateTermsCondition', 'AdminController@UpdateTermsCondition');

    Route::get('/AdminSpHelp', 'AdminController@AdminSpHelp')->name('AdminSpHelp');

    Route::post('/SendHelp', 'AdminController@SendHelp');

    Route::get('/announcement/{data?}', 'AdminController@announcement')->name('announcement');

    Route::post('/AddAnnouncement', 'AdminController@AddAnnouncement');

    Route::get('/DeleteAnnouncement', 'AdminController@DeleteAnnouncement');

    Route::post('/UpdateAnnouncement', 'AdminController@UpdateAnnouncement');

    /* Service provider Admin Panel Route */

    Route::get('/category/{data?}', 'categoryController@categoryIndex')->name('admin.category');
    Route::post('/category', 'categoryController@categoryInsert')->name('admin.categoryInsert');
    Route::post('/categoryUpdate', 'categoryController@categoryUpdate')->name('admin.categoryUpdate');
    Route::get('/catViewUpdate', 'categoryController@catViewUpdate');
    Route::get('/DeleteSerCategory', 'categoryController@DeleteSerCategory');

    Route::get('/subcategory/{data?}', 'categoryController@subcategoryIndex')->name('admin.subcategory');
    Route::post('/subcategory', 'categoryController@subcategoryInsert')->name('admin.subcategoryInsert');
    Route::post('/subcategoryUpdate', 'categoryController@subcategoryUpdate')->name('admin.subcategoryUpdate');
    Route::get('/DeleteSerSubCategory', 'categoryController@DeleteSerSubCategory');

    Route::get('/category3/{data?}', 'categoryController@category3Index')->name('admin.category3');
    Route::post('/category3', 'categoryController@category3Insert')->name('admin.category3Insert');
    Route::post('/category3Update', 'categoryController@category3Update')->name('admin.category3Update');
    Route::get('/DeleteSerCategory3', 'categoryController@DeleteSerCategory3');

    Route::get('/category4/{data?}', 'categoryController@category4Index')->name('admin.category4');
    Route::post('/category4', 'categoryController@category4Insert')->name('admin.category4Insert');
    Route::post('/category4Update', 'categoryController@category4Update')->name('admin.category4Update');
    Route::get('/DeleteSerCategory4', 'categoryController@DeleteSerCategory4');

    Route::get('/servicePanel/{data?}', 'categoryController@servicePanelIndex')->name('admin.servicePanel');
    Route::post('/servicePanel', 'categoryController@servicePanelInsert')->name('admin.servicePanelInsert');
    Route::post('/servicePanelUpdate', 'categoryController@servicePanelUpdate')->name('admin.servicePanelUpdate');
    Route::get('/serViewUpdate', 'categoryController@serViewUpdate');
    Route::get('/DeleteServicePanel', 'categoryController@DeleteServicePanel');
});



