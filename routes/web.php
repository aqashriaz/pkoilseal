<?php
 
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*Super Admin Middleware  routes*/

Route::group(['middleware' => ['admin']], function(){

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shortagealert', 'HomeController@shortagealert')->name('shortagealert');

/*Super Admin Add Admin  routes*/

Route::get('/addAdmin', 'AdminController@index');
Route::get('/userlist', 'AdminController@userlist');
Route::post('/insertAdmin', 'AdminController@insertAdmin');
Route::get('/userlist/{id}/delete', 'AdminController@delete');
Route::get('/get_userlist', 'AdminController@get_userlist')->name('get_userlist');
Route::post('/userlist_update', 'AdminController@userlist_update')->name('userlist_update');

/*Super Admin Add Products  routes*/

Route::get('/product', 'ProductController@index');
Route::post('/product', 'ProductController@save');
Route::Post('/update_product', 'ProductController@update_product');
Route::get('/product/{id}/delete', 'ProductController@delete');
Route::get('/get_product', 'ProductController@get_product')->name('get_product');

Route::get('/barcode', 'BarCodePrintController@barcodeindex');
Route::post('/savebar', 'BarcodeController@save');

/*Super Admin Add Inventories  routes*/

Route::get('/inventory', 'InventoryController@inventoryHome');
Route::post('/fetch1', 'InventoryController@fetch1')->name('fetch1');
Route::post('/fetch2', 'InventoryController@fetch2')->name('fetch2');
Route::post('/save', 'InventoryController@save');
Route::get('/inventory/{id}/delete', 'InventoryController@delete');
Route::get('/get_inventory', 'InventoryController@get_inventory')->name('get_inventory');
Route::post('/inventory_update', 'InventoryController@inventory_update')->name('inventory_update');
Route::get('/history', 'InventoryController@inventoryHistory');

/*Super Admin Add Ware Houses  routes*/

Route::get('/warehouse', 'WarehouseController@index');
Route::post('/warehouseinsert', 'WarehouseController@warehouseinsert');
Route::get('/warehouse/{id}/delete', 'WarehouseController@delete');
Route::get('/get_warehouse', 'WarehouseController@get_warehouse')->name('get_warehouse');
Route::post('/warehouse_update', 'WarehouseController@warehouse_update')->name('warehouse_update');

/*Super Admin Add Cabins  routes*/

Route::get('/cabin', 'CabinController@index');
Route::post('/insertcabin', 'CabinController@insertcabin');
Route::get('/cabin/{id}/delete', 'CabinController@delete');
Route::get('/get_cabin', 'CabinController@get_cabin')->name('get_cabin');
Route::post('/cabin_update', 'CabinController@cabin_update')->name('cabin_update');


/*Super Admin Print Barcode  routes*/

Route::get('/prnpriview','BarCodePrintController@prnpriview');
Route::get('/pdf','BarCodePrintController@pdf');
Route::get('/downloadPDF/{id}','BarCodePrintController@downloadPDF');

/*Super Admin Print Barcode  routes*/
Route::post('/admin_profile', 'HomeController@admin_profile');
Route::get('/admin_index_profile', 'HomeController@admin_index_profile')->name('admin_index_profile');

/*Super Admin Generate Report  routes*/

Route::get('/report_date', 'reportController@report_date')->name('report_date');
Route::post('/report_record', 'reportController@report_record')->name('report_record');
Route::get('/reportindex', 'reportController@reportindex')->name('reportindex');
Route::get('/reportViewIndex', 'reportController@reportViewIndex')->name('reportViewIndex');
Route::get('/todayReport', 'reportController@todayReport')->name('todayReport');
Route::get('/weeklyreport', 'reportController@weeklyreport')->name('weeklyreport');
Route::get('/monthlyreport', 'reportController@monthlyreport')->name('monthlyreport');
Route::get('/yearlyreport', 'reportController@yearlyreport')->name('yearlyreport');

/*Super Admin Add Color  routes*/

Route::get('/profit_index','ProfitController@profit_index');
Route::post('/profit_date','ProfitController@profit_date')->name('profit_date');
Route::get('/todayprofit','ProfitController@todayprofit');
Route::get('/weeklyprofit','ProfitController@weeklyprofit');
Route::get('/monthlyprofit','ProfitController@monthlyprofit');
Route::get('/yearlyprofit','ProfitController@yearlyprofit');

/*Super Admin Add Color  routes*/

Route::get('/indexColor', 'ColorController@indexColor')->name('indexColor');
Route::post('/insertcolor', 'ColorController@insertcolor')->name('insertcolor');
Route::get('/indexColor/{id}/delete', 'ColorController@delete');

/*Super Admin Add Threshold  routes*/

Route::get('/threshold', 'ThresholdController@threshold');
Route::post('/thresholdinsert', 'ThresholdController@insertThreshold');
Route::get('/threshold/{id}/delete', 'ThresholdController@delete');


/*Super Admin All Invoices  routes*/


Route::get('/invoiceindex', 'invoices@invoiceindex');
Route::post('/invoicedate', 'invoices@invoicedate');
Route::get('/todayinvoice', 'invoices@todayinvoice');
Route::get('/weeklyinvoice', 'invoices@weeklyinvoice');
Route::get('/monthlyinvoice', 'invoices@monthlyinvoice');
Route::get('/yearlyinvoice', 'invoices@yearlyinvoice');

/*Super Admin download invoice  routes*/

Route::get('/prntpriview','invoices@prntpriview');
Route::get('/invoicepdf','invoices@invoicepdf');
Route::get('/downloadinvoice/{invoice_number}','invoices@downloadinvoice');

});







/*Inventory Admin Middleware  routes*/

Route::group(['middleware' => ['inventoryadmin']], function(){

Route::get('/invent_Home', 'InventoryhomeController@index')->name('invent_Home');


/*Inventory Admin Add Products  routes*/
 
Route::get('/invent_product', 'inventoryProductController@invent_product');
Route::post('/invent_save', 'inventoryProductController@invent_save');
Route::get('/invent_product/{id}/delete', 'inventoryProductController@delete');
Route::get('/invent_get_product', 'inventoryProductController@invent_get_product')->name('invent_get_product');
Route::post('/invent_product_update', 'inventoryProductController@invent_product_update')->name('invent_product_update');

/*Inventory Admin Add inventory  routes*/
 
Route::get('/invent_inventory', 'invent_inventory@invent_inventory');
Route::post('/invent_fetch1', 'invent_inventory@invent_fetch1')->name('invent_fetch1');
Route::post('/inventory_save', 'invent_inventory@inventory_save');
Route::get('/invent_inventory/{id}/delete', 'invent_inventory@delete');
Route::get('/invent_get_inventory', 'invent_inventory@invent_get_inventory')->name('invent_get_inventory');
Route::post('/invent_update_inventory', 'invent_inventory@invent_update_inventory')->name('invent_update_inventory');

/*Inventory Admin Add inventory  routes*/

Route::get('/invent_cabin', 'InventCabinController@invent_cabin');
Route::post('/createcabin', 'InventCabinController@createcabin');
Route::get('/invent_cabin/{id}/destroy', 'InventCabinController@destroy');
Route::get('/edit_cabin', 'InventCabinController@edit_cabin')->name('edit_cabin');
Route::post('/store_cabin', 'InventCabinController@store_cabin')->name('store_cabin');

/*Inventory Admin Warehouse  routes*/
Route::get('/index_warehouse', 'invent_warehouseController@index');
Route::post('/invent_insert', 'invent_warehouseController@invent_insert');
Route::get('/index_warehouse/{id}/delete', 'invent_warehouseController@delete');
Route::get('/invent_ware', 'invent_warehouseController@invent_ware')->name('invent_ware');
Route::post('/invent_update', 'invent_warehouseController@invent_update')->name('invent_update');


/*Inventory Admin Profile Updates  routes*/

Route::get('/invent_profile', 'InventoryhomeController@invent_profile');
Route::post('/update_profile', 'InventoryhomeController@update_profile');

/*Inventory Admin Add Color  routes*/

Route::get('/invent_color', 'invent_ColorController@invent_color')->name('invent_color');
Route::post('/invent_insert_color', 'invent_ColorController@invent_insert_color')->name('invent_insert_color');
Route::get('/invent_color/{id}/delete', 'invent_ColorController@delete');

/*Inventory Admin Add Threshold  routes*/

Route::get('/invent_threshold', 'Invent_ThresholdController@invent_threshold');
Route::post('/invent_threshold_insert', 'Invent_ThresholdController@invent_threshold_insert');
Route::get('/invent_threshold/{id}/delete', 'Invent_ThresholdController@delete');


});






/*Front Admin Middle ware*/

Route::group(['middleware' => ['frontadmin']], function(){

	Route::get('/frontdesk)', function(){
		 return view('frontdesk');
});

	/*front desk home page*/
Route::get('/frontdesk', 'frontdeskmanager@frontdesk')->name('frontdesk');
Route::post('/stockmanage/{id}', 'frontdeskmanager@stockmanage');
Route::post('/stockmanage', 'frontdeskmanager@stockmanage');
Route::get('/saleout', 'frontdeskmanager@saleout')->name('saleout');
Route::post('/saleout_update', 'frontdeskmanager@saleout_update')->name('saleout_update');
Route::post('/update_quantity', 'frontdeskmanager@update_quantity')->name('update_quantity');
Route::post('/super_profile', 'frontdeskmanager@super_profile');
Route::get('/super_index_profile', 'frontdeskmanager@super_index_profile');


Route::get('/returnproduct', 'returnproduct@returnproduct');
Route::get('/productReturnConfirm/{id}', 'returnproduct@productReturnConfirm');
Route::post('/update_retrunproduct', 'returnproduct@update_retrunproduct');
Route::get('/get_returnproduct', 'returnproduct@get_returnproduct')->name('get_returnproduct');
Route::post('/returnitem', 'returnproduct@returnitem');


/*front cart controller */
Route::get('/cart_index', 'Add_To_Controller@cart_index');
Route::post('/checkout', 'Add_To_Controller@checkout');
Route::get('/invoice', 'Add_To_Controller@invoice');
Route::get('/cart_index/{id}/delete', 'Add_To_Controller@delete');
Route::get('/destroy', 'Add_To_Controller@destroy');


/*front Admin save pdf  routes*/

Route::get('/invoicepdf','Invoice_pdf@invoicepdf');
Route::get('/pdfpriview','Invoice_pdf@pdfpriview');
Route::get('/downloadPDF/{id}','Invoice_pdf@downloadPDF');


});



Route::get('/error', 'error@errorlog')->name('error');