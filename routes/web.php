<?php
use App\Gitara;

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

Auth::routes();

Route::get('/', 'indexController@index')->name('home');
Route::get('/new', 'GitaraController@nowe')->name('new');
Route::get('/old', 'GitaraController@stare')->name('stare');
Route::get('/akord', 'GitaraController@akord')->name('akord');
Route::get('/akord2', 'GitaraController@akord2')->name('akord2');
Route::get('/fingerstyle', 'GitaraController@fingerstyle')->name('fingerstyle');
Route::get('/short', 'GitaraController@krotkie')->name('short');
Route::get('/create', 'GitaraController@create')->name('create');
Route::get('/createsource', 'GitaraController@createsource')->name('createsource');
Route::get('/createcollection', 'GitaraController@createkolekcja')->name('createkolekcja');

Route::get('/edit/{id}', 'GitaraController@edit')->name('edit');
Route::get('/indexsource/{id}', 'GitaraController@indexsource')->name('indexsource');
Route::get('/indexcollection/{id}', 'GitaraController@indexcollection')->name('indexkolekcja');


Route::post('/store', 'GitaraController@store')->name('store');
Route::post('/storesource', 'GitaraController@storesource')->name('storesource');
Route::post('/storekolekcja', 'GitaraController@storekolekcja')->name('storekolekcja');

Route::patch('/update/{id}', 'GitaraController@update')->name('update');

Route::get('/categories', 'GitaraController@categories')->name('categories');
Route::get('/magiel', 'GitaraController@magiel')->name('magiel');
Route::get('/kasa', 'GitaraController@kasa')->name('kasa');




Route::delete('/delete/{id}', function ($id) {
    $gitara=Gitara::find($id);
    $gitara->delete();
    session()->flash('message', 'Usunięto pozycje');
    return redirect()->route('home');
})->name('delete');
