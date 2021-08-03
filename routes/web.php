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
Route::get('/login', function () {
    return 'Login';
})->name('login');

//grupo de rostos que é necessário autenticacao
Route::middleware(['auth'])->group(function () {

    //grupo de rotas com um pré fixo
    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', 'Admin\TesteController@teste');
        
        Route::get('/financeiro', 'Admin\TesteController@teste');
        
        Route::get('/produtos', 'Admin\TesteController@teste');

        //rota barra
        Route::get('/', 'Admin\TesteController@teste');
        

    });
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
