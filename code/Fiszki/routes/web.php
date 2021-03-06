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
Route::get('/', 'PagesController@index' );
//Route::get('/learning', 'LearningController@index' );
Route::get('/progress', 'PagesController@progress' );
Route::get('/management', 'PagesController@management' );


/*
 * GET /projects (index)
 *
 * GET /projects/create (create)
 *
 * GET /projects/1 (show)
 *
 * POST /projects (store)
 *
 * GET /projects/1/edit (edit)
 *
 * PATCH /project/1 (update)
 *
 * DELETE /project/1 (destroy)
 *
 */

//Route::get('/initDatabase', 'PagesController@initDatabase' );




Route::resource( 'flashcards', 'FlashcardController' )->middleware('auth');
//Route::resource( 'memoboxes', 'MemoboxesController' )->middleware('can:update,memobox');
Route::resource( 'memoboxes', 'MemoboxesController' )->middleware('auth');


Route::get( '/learning/correct_answer/{flashcard}', 'LearningController@correct_answer' )->middleware('auth');
Route::get( '/learning/wrong_answer/{flashcard}', 'LearningController@wrong_answer' )->middleware('auth');
Route::get( '/learning/flip/{flashcard}', 'LearningController@flip' )->middleware('auth');
Route::get( '/learning/{memobox}', 'LearningController@show' )->middleware('auth');
Route::resource( 'learning', 'LearningController' )->middleware('auth');

//Route::get('/flashcards/create', 'FlashcardController@create' );
//Route::get( '/flashcards/{flashcard}', 'FlashcardController@show' );
//Route::get('/flashcards/{flashcard}/edit', 'FlashcardController@edit');
//Route::post('/flashcards', 'FlashcardController@store' );
//Route::patch( '/flashcards/{flashcard}', 'FlashcardController@update' );
//Route::delete( '/flashcards/{flashcard}', 'FlashcardController@destroy' );//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
