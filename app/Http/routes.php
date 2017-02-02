<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware'=>['auth','admin']], function(){
	Route::resource('admin','AdminController');
	Route::resource('group','GroupController');
	Route::resource('type','ProductypeController');
	Route::resource('perfil','RolController');
	Route::resource('category','CategoryController');
	Route::resource('user','UserController');
	Route::resource('userTrash','UserTrashController');

	Route::get('api/usuarios','UserController@getUsuarios');
	Route::get('api/admins','AdminController@getAdmins');
	Route::get('api/grupos','GroupController@getGrupos');
	Route::get('api/perfiles','RolController@getPerfil');
	Route::get('api/categorias','CategoryController@getCategoria');
	Route::get('api/tipoProductos','ProductypeController@getTipoProducto');
	Route::get('api/bajaUsuarios','UserTrashController@getUsuario');
	Route::get('api/gasolineras/{id}','AdminController@getGasolineras');
	Route::get('api/farmacias/{id}','AdminController@getFarmacias');
	Route::get('api/bancos/{id}','AdminController@getBancos');

	/*Rutas para reportes PDF*/
	Route::get('reporteUsuarios/{id}','AdminController@getReporteUsuarios');
	Route::get('reporteAdmin/{id}','AdminController@getReporteAdmin');
	Route::get('reporteGasolineras/{id}','AdminController@getReporteGasolineras');
	Route::get('reporteFarmacias/{id}','AdminController@getReporteFarmacias');
	Route::get('reporteBancos/{id}','AdminController@getReporteBancos');
});


Route::group(['middleware'=>['auth','operador']], function(){
	Route::resource('company','CompanyController');
	Route::resource('admincompany','CompanyAdminController');
	Route::resource('adminbranch','CompanyBranchController');
	Route::resource('product','ProductController');
	Route::resource('presentation','ProductPresentationController');
	Route::resource('credit','CreditController');
	Route::resource('promotion','ProductPromoController');
	Route::resource('stock','StockProductController');
	Route::resource('operadoresTrash','CompanyTrashController');

	Route::get('api/operadores','CompanyController@getSocios');
	Route::get('api/creditos','CreditController@getCredits');
	Route::get('api/products','ProductController@getProducts');
	Route::get('api/productGaso','ProductController@getProductGaso');
	Route::get('api/promotions','ProductPromoController@getPromo');
	Route::get('/api/presentation/{id}','ProductPresentationController@getPresentaciones');
	Route::get('/api/promotion/{id}','ProductPromoController@getPromociones');
	Route::get('api/listaPromociones','ProductPromoController@listaPromociones');
	Route::get('api/operadoresTrash','CompanyTrashController@getSociosEliminados');



	/*Rutas para reportes PDF*/
	Route::get('reporteEmpresa/{id}','CompanyController@getReporteEmpresa');
	Route::get('reporteSucursales/{id}','CompanyBranchController@getReporteSucursales');
	Route::get('reporteProductos/{id}','ProductController@getReporteProductos');
	Route::get('reporteCombustibles/{id}','ProductController@getReporteCombustibles');
	Route::get('reporteCreditos/{id}','CreditController@getReporteCreditos');
	Route::post('postImport','ProductController@postImport');
});

Route::group(['middleware'=>['auth']], function(){
	Route::resource('branch','BranchController');
	Route::resource('schedule','ScheduleController');
	Route::resource('shift','ShiftController');
	Route::resource('stock','StockProductController');
	Route::resource('products','StockCompanyController');
	Route::resource('profile','ProfileController');

	Route::get('api/sucursales','CompanyBranchController@getSucursales');
	Route::get('api/horarios','ScheduleController@getHorarios');
	Route::get('api/turnos','ShiftController@getTurnos');

	Route::get('reporteTurnos/{id}','ShiftController@getReporteTurnos');
	Route::get('reporteSucursal/{id}','BranchController@getSucursal');
	Route::get('reporteMisProductos/{id}','StockProductController@getMisProductos');
	
	//esta pendiente si se usa o no (REVISA EN PRODUCTCOPMAY)
	Route::get('api/stock','StockCompanyController@getStockSucursal');
	Route::get('api/stockEmpresa','StockProductController@getStock');
	Route::get('api/miStock','StockCompanyController@getMiStock');
});



Route::resource('/','MapsController');
Route::resource('log','LogController');
Route::get('cantons/{id}','BranchController@getCantons');
Route::get('parishes/{id}','BranchController@getParishes');
Route::get('logout','LogController@logout');


/*Rutas para las páginas de inicio*/

Route::resource('ari','AriController');
Route::get('ari/{id}/{id2}','AriController@mostrar');
Route::post('farmacia','AriController@postFarmacia');
Route::post('gasolinera','AriController@postGasolinera');
Route::post('banco','AriController@postBanco');

//ESTAS RUTAS AHIQ UE BORRARLAS PORQUE YA NO SE USAN
Route::get('allfarmacias','MapsController@getFarmaciasM');
Route::get('allgasolineras','MapsController@getGasolinerasM');
Route::get('allbancos','MapsController@getBancosM');

Route::get('/searchf',array('as'=>'searchf','uses'=>'MapsController@autocompletef'));
Route::get('/searchg',array('as'=>'searchg','uses'=>'MapsController@autocompleteg'));
Route::get('/searchb',array('as'=>'searchb','uses'=>'MapsController@autocompleteb'));

/*Rutas para recuperar contraseña*/
Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');
Route::get('password/reset/{token}','Auth\PasswordController@getReset');
Route::post('password/reset','Auth\PasswordController@postReset');

Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}','Auth\AuthController@confirmRegister');

//Rutas para la busqueda de FARMACIAS, GASOLINERAS, BANCOS Y MEDICAMENTOS (INICIO)
Route::get('gasolinera/{id1}/{id2}','AriController@getGasoCercanas');



