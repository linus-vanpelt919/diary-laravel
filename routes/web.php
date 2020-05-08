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

use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return view('top');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/profEdit/{id}', 'ProfEditController@edit')->name('profEdit');
Route::get('/profEdit/{id}/', 'ProfEditController@index')->name('profEdit')->middleware('check');
Route::post('/profEdit/{id}/', 'ProfEditController@edit')->name('profUpdate');//プロフ編集
Route::get('/prof', 'ProfController@index')->name('prof');
Route::get('/createForm', 'CreateFormController@index')->name('createForm');
Route::get('/diary', 'DiaryController@index')->name('diary');//日記ページ
Route::post('/diary', 'DiaryController@create')->name('diary_create');//日記作成
Route::get('/diaryListPage','DiaryListPageController@index')->name('diaryList');//日記一覧ページ
Route::post('/diaryListPage','DiarySortController@show')->name('sort');//降順昇順(サイドバー) getで操作したい
Route::get('/diaryEdit/{id}/', 'DiaryEditController@index')->name('diaryEdit');//日記編集ページ
Route::post('/diaryEdit/{id}/', 'DiaryEditController@edit')->name('diary_edit');//日記編集
Route::post('/diaryEdit/{id}/delete', 'DiaryDeleteController@delete')->name('diary_delete');//日記編集
Route::get('mypage/','MypageController@mypage')->name('mypage')->middleware('check');
Route::get('diaryDetailPage/{id}','DiaryDetailPageController@index')->name('diary_detail_page');//日記詳細ページ


Route::get('practiceForm/','practiceFormController@index')->name('practiceForm');//練習用

//Route::group(['middleware'=>'check'],function() {

//});で囲ってあげる
