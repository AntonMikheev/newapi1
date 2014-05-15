<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::model('news', 'News');   
Route::get('news', array( 'as' => 'viewnews', 'uses' => 'NewsController@news'));
Route::get('heading', array( 'as' => 'viewheading', 'uses' => 'HeadingController@heading'));
Route::get('reviews', array('as' => 'viewreviews', 'uses' => 'ReviewsController@reviews'));
Route::get('tags', array('as' => 'viewtags', 'uses' => 'TagsController@tags'));
Route::get('deletenews/{news}', array('as' => 'delnews', 'uses' => 'NewsController@delete'));
Route::get('addnews', array('as' => 'add-news', 'uses' => 'NewsController@viewFormAddNews'));
Route::post('addnews', array('as' => 'add-news', 'uses' => 'NewsController@addNews'));
Route::get('editnews/{news}', array( 'as' => 'editdatnews', 'uses' => 'NewsController@viewFormEditNews')); 
Route::post('edit-news/{news}', array( 'as' => 'editnews', 'uses' => 'NewsController@editNews'));
Route::model('reviews', 'Reviews'); 
Route::get('deletereviews/{reviews}', array('as' => 'delreviews', 'uses' => 'ReviewsController@delete'));
Route::get('addreviews', array('as' => 'add-reviews', 'uses' => 'ReviewsController@viewFormAddReviews'));
Route::post('addreviews', array('as' => 'add-reviews', 'uses' => 'ReviewsController@addReviews'));
Route::get('editreviews/{reviews}', array( 'as' => 'editdatreviews', 'uses' => 'ReviewsController@viewFormEditReviews')); 
Route::post('edit-reviews/{reviews}', array( 'as' => 'editreviews', 'uses' => 'ReviewsController@editReviews'));


Route::get('viewregistrform',array('as' => 'viewregistrform', 'uses' => 'UserController@viewFormRegistration'));
Route::post('registration',array('as' => 'registration', 'uses' => 'UserController@registrationNewUser'));
Route::get('userloginform',array('as' => 'userloginform', 'uses' => 'UserController@userLoginForm'));
Route::post('userlogin',array('as' => 'userlogin', 'uses' => 'UserController@userLogin'));
Route::get('userlogout',array('as' => 'userlogout', 'uses' => 'UserController@userLogout'));






Route::get('api.laraveltest/reviews',array('as' => 'api.reviews', 'uses' => 'ReviewsController@apiReviews'));
Route::get('api.laraveltest/singlereview/{id}',array('as' => 'api.single.reviews', 'uses' => 'ReviewsController@apiSingleReview'));
Route::delete('api.laraveltest/reviewsdel/{id}',array('as' => 'api.reviews.del', 'uses' => 'ReviewsController@apiDelReviews'));
Route::post('api.laraveltest/addreviews', array('as' => 'api.reviews.add', 'uses' => 'ReviewsController@apiAddReviews'));
Route::post('api.laraveltest/editreviews', array('as' => 'api.reviews.edit', 'uses' => 'ReviewsController@apiEditReviews'));
Route::post('api.laraveltest/findbytext', array('as' => 'api.reviews.findbytext', 'uses' => 'ReviewsController@findByText'));
Route::post('api.laraveltest/findbytag', array('as' => 'api.reviews.findbytag', 'uses' => 'ReviewsController@findByTag'));
Route::get('api.laraveltest/returndata',array('as' => 'api.returndata', 'uses' => 'ReviewsController@apiReturnData'));
Route::get('api.laraveltest/returndataid/{id}',array('as' => 'api.returndata.id', 'uses' => 'ReviewsController@apiReturnDataId'));








Route::get('api.laraveltest/curlreviews',array('as' => 'api.curl.reviews', 'uses' => 'ApiReviewsController@curlApiReviews'));

Route::get('api.laraveltest/curlsinglereview/{id}', array('as' => 'api.curl.singlereviews', 'uses' => 'ApiReviewsController@curlApiSingleReview'));
Route::get('api.laraveltest/curlreviewsdel/{id}', array('as' => 'api.curl.reviews.del', 'uses' => 'ApiReviewsController@curlApiDelReviews'));

Route::get('api.laraveltest/curladdreviews', array('as' => 'api.curl.reviews.form.add', 'uses' => 'ApiReviewsController@curlApiFormAddReviews'));
Route::post('api.laraveltest/curladdreviews', array('as' => 'api.curl.reviews.add', 'uses' => 'ApiReviewsController@curlApiAddReviews'));

Route::get('api.laraveltest/curleditreviews/{id}', array('as' => 'api.curl.reviews.form.edit', 'uses' => 'ApiReviewsController@curlApiFormEditReviews'));
Route::post('api.laraveltest/curleditreviews/{id}', array('as' => 'api.curl.reviews.edit', 'uses' => 'ApiReviewsController@curlApiEditReviews'));

Route::get('api.laraveltest/curlfindbytag', array('as' => 'api.curl.reviews.formfindbytag', 'uses' => 'ApiReviewsController@curlFormFindByTag'));
Route::post('api.laraveltest/curlfindbytag', array('as' => 'api.curl.reviews.findbytag', 'uses' => 'ApiReviewsController@curlFindByTag'));

Route::get('api.laraveltest/curlfindbytext', array('as' => 'api.curl.reviews.formfindbytext', 'uses' => 'ApiReviewsController@curlFormFindByText'));
Route::post('api.laraveltest/curlfindbytext', array('as' => 'api.curl.reviews.findbytext', 'uses' => 'ApiReviewsController@curlFindByText'));





