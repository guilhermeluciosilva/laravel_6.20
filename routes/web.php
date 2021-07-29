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

Route::get('redirect1', function (){
    return redirect('/redirect2');
});

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
