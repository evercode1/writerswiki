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

//  Admin Routes

Route::get('/admin', 'AdminController@index')->name('admin');


// api routes

Route::get('api/alarm-data', 'ApiController@alarmData');
Route::get('api/alarm-data-admin', 'ApiController@alarmDataAdmin');
Route::get('/api/all-articles-data', 'ApiController@allArticlesData');
Route::get('/api/all-books-data', 'FrontApiController@allBooksData');
Route::get('/api/book-data', 'ApiController@bookData')->middleware(['auth', 'admin']);
Route::get('/api/all-media-links-data/{type}', 'FrontApiController@allMediaLinksData');
Route::get('api/article-list-data', 'ApiController@articleListData');
Route::get('api/archives', 'ApiController@archives');
Route::get('api/categories-for-dropdown', 'ApiController@categoriesForDropdown');
Route::any('api/category-data', 'ApiController@categoryData')->middleware(['auth', 'admin']);
Route::get('api/closed-contact-data', 'ApiController@closedContactData')->middleware(['auth', 'admin']);
Route::get('api/contact-data', 'ApiController@ContactData')->middleware(['auth', 'admin']);
Route::any('api/contact-topic-data', 'ApiController@contactTopicData')->middleware(['auth', 'admin']);
Route::any('api/content-data', 'ApiController@contentData')->middleware(['auth', 'admin']);
Route::get('api/contributor-link-data', 'ApiController@contributorLinkData')->middleware(['auth', 'admin']);
Route::get('api/contributor-link-type-data', 'ApiController@contributorLinkTypeData')->middleware(['auth', 'admin']);
Route::get('api/media-link-type-data', 'ApiController@mediaLinkTypeData')->middleware(['auth', 'admin']);
Route::get('api/media-link-types', 'ApiController@mediaLinkTypes')->middleware(['auth', 'admin']);
Route::get('api/open-contact-data', 'ApiController@openContactData')->middleware(['auth', 'admin']);
Route::get('api/pending-contributor-data', 'ApiController@pendingContributorData')->middleware(['auth', 'admin']);
Route::any('api/profile-data', 'ApiController@profileData')->middleware(['auth', 'admin']);
Route::any('api/subcategory-data', 'ApiController@subcategoryData')->middleware(['auth', 'admin']);
Route::get('api/subcategories-for-dropdown/{id}', 'ApiController@subcategoriesForDropdown');
Route::get('api/signature-data/{user}', 'ApiController@signature');
Route::get('api/user-data', 'ApiController@userData')->middleware(['auth', 'admin']);


// auth routes

Auth::routes();

// Begin Book Routes


Route::post('book-delete/{id}', 'BookController@destroy');

Route::get('/book/create', 'BookController@create')->name('book.create');

Route::get('book/{id}', 'BookController@show')->name('book.show');

Route::resource('book', 'BookController', ['except' => ['show', 'create','destroy']]);

// End Book Routes

// Begin Category Routes

Route::post('category-delete/{category}', 'CategoryController@destroy');

Route::resource('category', 'CategoryController', ['except' => ['destroy']]);

// End Category Routes

// Contact Routes

Route::post('/contact-delete', 'Contacts\ContactController@destroy')->name('contact.destroy');

Route::resource('/contact', 'Contacts\ContactController', ['except' => ['destroy']]);

Route::get('/open-contacts', 'Contacts\OpenContactController@index')->name('contact.open');

Route::get('/closed-contacts', 'Contacts\ClosedContactController@index');


// Begin ContactTopic Routes


Route::post('/contact-topic-delete/{id}', 'Contacts\ContactTopicController@destroy')->name('contact-topic.destroy');

Route::get('/contact-topic/create', 'Contacts\ContactTopicController@create')->name('contact-topic.create');

Route::get('contact-topic/{id}', 'Contacts\ContactTopicController@show')->name('contact-topic.show');

Route::resource('contact-topic', 'Contacts\ContactTopicController', ['except' => ['destroy']]);

// End ContactTopic Routes

// Begin Content Routes

Route::post('content-delete/{id}', 'ContentController@destroy');

Route::get('/content/create', 'ContentController@create')->name('content.create');

Route::get('content/{id}', 'ContentController@show')->name('content.show');

Route::resource('content', 'ContentController', ['except' => ['show', 'create','destroy']]);

// End Content Routes

// contributor routes

Route::get('contributor', 'ContributorController@index')->name('contributor.index');
Route::post('contributor', 'ContributorController@store')->name('contributor.store');

// Begin ContributorLinkType Routes

Route::post('contributor-link-type-delete/{id}', 'ContributorLinkTypeController@destroy');

Route::get('/contributor-link-type/create', 'ContributorLinkTypeController@create')->name('contributor-link-type.create');

Route::get('contributor-link-type/{id}', 'ContributorLinkTypeController@show')->name('contributor-link-type.show');

Route::resource('contributor-link-type', 'ContributorLinkTypeController', ['except' => ['show', 'create','destroy']]);

// End ContributorLinkType Routes

// Begin ContributorLink Routes

Route::post('contributor-link-delete/{id}', 'ContributorLinkController@destroy');

Route::get('/contributor-link/create', 'ContributorLinkController@create')->name('contributor-link.create');

Route::get('contributor-link/{id}', 'ContributorLinkController@show')->name('contributor-link.show');

Route::resource('contributor-link', 'ContributorLinkController', ['except' => ['show', 'create','destroy']]);

// End ContributorLink Routes

//  home routes

Route::get('/', 'HomeController@index')->name('home.index');

Route::get('/home', 'HomeController@index')->name('home.index');

// Manage Links

Route::get('manage-links', 'ManageLinksController@index')->name('manage-links.index');
Route::get('manage-links/create', 'ManageLinksController@create')->name('manage-links.create');
Route::post('manage-links', 'ManageLinksController@store')->name('manage-links.store');
Route::get('manage-links/{id}/edit', 'ManageLinksController@edit')->name('manage-links.edit');
Route::post('manage-links/{id}', 'ManageLinksController@update')->name('manage-links.update');
Route::post('manage-links-delete/{id}', 'ManageLinksController@destroy');

// Begin MediaLink Routes

Route::get('all-{type}', 'AllMediaLinksController@media');



Route::any('api/media-link-data', 'ApiController@mediaLinkData');

Route::post('media-link-delete/{id}', 'MediaLinkController@destroy');

Route::get('/media-link/create', 'MediaLinkController@create')->name('media-link.create');

Route::get('media-link/{id}', 'MediaLinkController@show')->name('media-link.show');

Route::resource('media-link', 'MediaLinkController', ['except' => ['show', 'create','destroy']]);

// End MediaLink Routes

// Begin MediaLinkType Routes

Route::post('media-link-type-delete/{id}', 'MediaLinkTypeController@destroy');

Route::get('/media-link-type/create', 'MediaLinkTypeController@create')->name('media-link-type.create');

Route::get('media-link-type/{id}', 'MediaLinkTypeController@show')->name('media-link-type.show');

Route::resource('media-link-type', 'MediaLinkTypeController', ['except' => ['show', 'create','destroy']]);

// End MediaLinkType Routes

// Pages Routes

Route::get('/about', 'PagesController@about')->name('pages.about');

Route::get('/cancel-account-confirmation', 'PagesController@cancelAccountConfirmation')->name('cancel.cancel-account-confirmation');

Route::get('/privacy-policy', 'PagesController@privacy')->name('pages.privacy');

Route::get('/terms-of-service', 'PagesController@terms')->name('pages.terms');

// pending contributors route

Route::get('pending-contributors', 'PendingContributorsController@index')->name('pending-contributors.index');

// Begin Profile Routes

Route::get('show-profile', 'ProfileController@showProfileToUser')->name('show-profile');

Route::get('my-profile', 'ProfileController@determineProfileRoute')->name('my-profile');

Route::post('profile-delete/{id}', 'ProfileController@destroy');

Route::get('profile/create', ['as' => 'profile.create', 'uses' => 'ProfileController@create']);

Route::get('profile/{id}-{slug?}', ['as' => 'profile.show', 'uses' => 'ProfileController@show']);

Route::resource('profile', 'ProfileController', ['except' => ['show', 'create', 'destroy']]);

// End Profile Routes

// Reply Routes

Route::resource('reply', 'ReplyController');

// Settings routes

Route::get('settings', 'SettingsController@edit');

Route::patch('settings', 'SettingsController@update')->name('user-update');

// Support Messages Routes

Route::get('support-messages', 'Contacts\MessagesController@index');

Route::get('support-messages-show/{message}', 'Contacts\MessagesController@show');

// user routes

Route::resource('user', 'UserController');


// Begin Subcategory Routes

Route::post('subcategory-delete/{id}', 'SubcategoryController@destroy');

Route::get('/subcategory/create', 'SubcategoryController@create')->name('subcategory.create');

Route::get('subcategory/{id}', 'SubcategoryController@show')->name('subcategory.show');

Route::resource('subcategory', 'SubcategoryController', ['except' => ['show', 'create','destroy']]);

// End Subcategory Routes

// test routes

Route::get('test', 'TestController@index')->name('test.index');































