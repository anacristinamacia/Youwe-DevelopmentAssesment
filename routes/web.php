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

Route::get('/', function () {
    Request::session()->put('success', false);
    return view('start');
});

Route::get('/FirstDraft', function () {
    return view('test1/game');
});
Route::post('/FirstDraft', 'test1\GameController@firstDraft');

Route::get('/Statistics', function () {
    return view('test1/draft');
});
Route::post('/Statistics', 'test1\GameController@draft');

Route::get('/InsertPhrase', function () {
    Request::session()->put('error', false);
    return view('test2/phrase');
});
Route::post('/InsertPhrase', 'test2\PhraseController@analyze');

Route::get('/Analyze', function () {
    return view('test2/analyze');
});
Route::post('/Analyze', 'test2\PhraseController@restart');
