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
Route::resource('products', 'ProductController');//->middleware('auth');

/*
Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');

//Editar um registro
Route::put('products/{id}', 'ProductController@update')->name('products.update');

Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');

Route::get('products/create', 'ProductController@create')->name('products.create');

//Passando parametros para o controler
Route::get('products/{id}', 'ProductController@show')->name('products.show');
//Aponta para o controller products
Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products', 'ProductController@stor')->name('products.store');
*/
Route::get('/login', function () {
    return 'Login';
})->name('login');

/*
//grupo de rostos que é necessário autenticacao
Route::middleware(['auth'])->group(function () {

    //grupo de rotas com um pré fixo
    Route::prefix('admin')->group(function () {
        
        //Coloca o nome de onde está o controler antes das funções
        Route::namespace('Admin')->group(function (){

            //Groupo de rotas do name da rota
            Route::name('admin.')->group(function () {
                
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
            
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
                
                Route::get('/produtos', 'TesteController@teste')->name('produtos');

                //rota barra
                Route::get('/', 'TesteController@teste')->name('home');


            }); 
        });
    });
});
*/

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');

    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
    
    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    //rota barra
    Route::get('/', 'TesteController@teste')->name('home');


});

// redireciono pelo nome da rota
Route::get('redirect3', function (){
    return redirect()->route('url.name');
});

// route('url.name');
Route::get('/nome-url', function () {
    return 'He hey hey';
})->name('url.name');

Route::view('/view', 'welcome', ['id' => 'teste']);

//Redirecionando url
Route::redirect('/redirect1', '/redirect2');

// Route::get('redirect1', function (){
//     return redirect('/redirect2');
// });

Route::get('redirect2', function (){
    return 'Redirect 02';
});

//Utilizo um parametro opcional
Route::get('/produtos/{idProduct?}', function ($idProduct = ''){
    return "Produto(s) {$idProduct}";
});

//O parametro precisa ser condizente
Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

//O parametro não precisa ser condizente
Route::get('/categorias/{flag}', function ($prm) {
    return "Produtos da categoria: {$prm}";
});

//Eu defino os parametros de como eu vou acessar essa rota
Route::match(['get', 'post', 'put'],'/match', function () {
    return 'match';
});

//Aceita todos os paramtros GET POST
Route::any('/any', function () {
    return 'Any';
});

Route::post('/register', function () {
    return 'empresa';
});

Route::get('/empresa', function () {
    return 'empresa';
});

Route::get('/contact', function () {
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');
});
