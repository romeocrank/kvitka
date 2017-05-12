<?php


Route::post('/image/save_photo', 'ImagesController@store');
Route::post('/image/remove_photo', 'ImagesController@destroy');
Route::post('/image/confirmed', 'ImagesController@edit');
Route::post('/album/cover_of_album', 'AlbumsController@edit');


Route::get('/admin/album/add_photos/{id}', 'ImagesController@create');
Route::get('/admin/album/edit_fotos/{id}', 'AlbumsController@create');
Route::get('/admin/album/get_privat_album_url/{id}', 'AlbumsController@url');
//dd(LaravelLocalization::getSupportedLocales());

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', 'AlbumsController@index');
    Route::get('/privat/albums/{album}', 'AlbumsController@show_privat');
    Route::get('/albums/{id}', 'AlbumsController@show');
    Route::get('/category/{title}', 'CategoriesController@show');
    Route::get('/contacts', 'CategoriesController@contacts');
});
