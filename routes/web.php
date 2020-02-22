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

// Begin ActionBeat Routes

Route::get('all-action-beats', 'AllActionBeatsController@index');

Route::post('action-beat-delete/{id}', 'ActionBeatController@destroy');

Route::get('/action-beat/create', 'ActionBeatController@create')->name('action-beat.create');

Route::get('action-beat/{id}', 'ActionBeatController@show')->name('action-beat.show');

Route::resource('action-beat', 'ActionBeatController', ['except' => ['show', 'create','destroy']]);

// End ActionBeat Routes

// Begin ActionBeatDescription Routes

Route::get('api/action-beat-description-data', 'ApiController@actionBeatDescriptionData')->middleware(['auth', 'admin']);

Route::get('/action-beat-description-preset/create/{type}', 'ActionBeatDescriptionController@createPreset')->name('action-beat-description.create-preset');

Route::post('action-beat-description-delete/{id}', 'ActionBeatDescriptionController@destroy');

Route::get('/action-beat-description/create', 'ActionBeatDescriptionController@create')->name('action-beat-description.create');

Route::get('action-beat-description/{id}', 'ActionBeatDescriptionController@show')->name('action-beat-description.show');

Route::resource('action-beat-description', 'ActionBeatDescriptionController', ['except' => ['show', 'create','destroy']]);

// End ActionBeatDescription Routes

// Action Beat Detail route

Route::get('action-beat-details/{type}', 'ActionBeatDetailsController@index')->name('action-beat-details.index');



//  Admin Routes

Route::get('/admin', 'AdminController@index')->name('admin');


// api routes


Route::get('/api/action-beat-details-data/{type}', 'FrontApiController@actionBeatDetailsData');
Route::any('api/action-beat-data', 'ApiController@actionBeatData')->middleware(['auth', 'admin']);
Route::get('/api/all-action-beats-data', 'FrontApiController@allActionBeatsData');
Route::get('api/alarm-data', 'ApiController@alarmData');
Route::get('api/alarm-data-admin', 'ApiController@alarmDataAdmin');
Route::get('/api/all-articles-data', 'ApiController@allArticlesData');
Route::get('/api/all-emotions-data', 'FrontApiController@allEmotionsData');
Route::get('/api/all-details-data', 'FrontApiController@allDetailsData');
Route::get('/api/all-media-links-data/{type}', 'FrontApiController@allMediaLinksData');
Route::get('api/categories-for-dropdown', 'ApiController@categoriesForDropdown');
Route::any('api/category-data', 'ApiController@categoryData')->middleware(['auth', 'admin']);
Route::any('api/channel-data', 'ApiController@channelData')->middleware(['auth', 'admin']);
Route::any('/api/all-channel-links-data/{author}', 'FrontApiController@allChannelLinksData')->middleware(['auth', 'admin']);
Route::get('api/closed-contact-data', 'ApiController@closedContactData')->middleware(['auth', 'admin']);
Route::get('api/contact-data', 'ApiController@ContactData')->middleware(['auth', 'admin']);
Route::any('api/contact-topic-data', 'ApiController@contactTopicData')->middleware(['auth', 'admin']);
Route::any('api/content-data', 'ApiController@contentData')->middleware(['auth', 'admin']);
Route::get('api/contributor-link-data', 'ApiController@contributorLinkData')->middleware(['auth', 'admin']);
Route::get('api/contributor-link-type-data', 'ApiController@contributorLinkTypeData')->middleware(['auth', 'admin']);
Route::any('api/description-data', 'ApiController@descriptionData')->middleware(['auth', 'admin']);
Route::get('api/description-detail-data/{type}', 'FrontApiController@descriptionDetailData');
Route::get('api/detail-data', 'ApiController@detailData')->middleware(['auth', 'admin']);
Route::any('api/emotion-data', 'ApiController@emotionData')->middleware(['auth', 'admin']);
Route::get('api/emotion-expression-data/{type}', 'FrontApiController@emotionExpressionData');
Route::any('api/media-link-data', 'ApiController@mediaLinkData')->middleware(['auth', 'admin']);
Route::get('api/media-link-type-data', 'ApiController@mediaLinkTypeData')->middleware(['auth', 'admin']);
Route::get('api/media-link-types', 'ApiController@mediaLinkTypes')->middleware(['auth', 'admin']);
Route::get('api/open-contact-data', 'ApiController@openContactData')->middleware(['auth', 'admin']);
Route::get('api/pending-contributor-data', 'ApiController@pendingContributorData')->middleware(['auth', 'admin']);
Route::any('api/profile-data', 'ApiController@profileData')->middleware(['auth', 'admin']);
Route::get('api/self-publishing-data', 'FrontApiController@selfPublishingData');
Route::any('api/subcategory-data', 'ApiController@subcategoryData')->middleware(['auth', 'admin']);
Route::get('api/subcategories-for-dropdown/{id}', 'ApiController@subcategoriesForDropdown');
Route::get('api/signature-data/{user}', 'ApiController@signature');
Route::get('api/user-data', 'ApiController@userData')->middleware(['auth', 'admin']);


// auth routes

Auth::routes();


// Begin Category Routes

Route::post('category-delete/{category}', 'CategoryController@destroy');

Route::resource('category', 'CategoryController', ['except' => ['destroy']]);

// End Category Routes

// Begin Channel Routes

Route::get('all-channels', 'AllChannelsController@index');

Route::get('/api/all-channels-data', 'FrontApiController@allChannelsData')->middleware(['auth', 'admin']);



Route::post('channel-delete/{id}', 'ChannelController@destroy');

Route::get('/channel/create', 'ChannelController@create')->name('channel.create');

Route::get('channel/{id}', 'ChannelController@show')->name('channel.show');

Route::resource('channel', 'ChannelController', ['except' => ['show', 'create','destroy']]);

// End Channel Routes

// Channel List Route


Route::get('/channel-list/{name}', 'ChannelListController@index')->name('channel-list-index');


// End Channel List route


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

// Begin Description Routes

Route::get('all-descriptions', 'AllDescriptionsController@index');

Route::get('/api/all-descriptions-data', 'FrontApiController@allDescriptionsData');


// Description Detail Route

Route::get('description-detail/{type}', 'DescriptionDetailController@index')->name('description-detail.index');



Route::post('description-delete/{id}', 'DescriptionController@destroy');

Route::get('/description/create', 'DescriptionController@create')->name('description.create');

Route::get('description/{id}', 'DescriptionController@show')->name('description.show');

Route::resource('description', 'DescriptionController', ['except' => ['show', 'create','destroy']]);

// End Description Routes

// Begin Detail Routes


Route::post('detail-delete/{id}', 'DetailController@destroy');

Route::get('/detail/create', 'DetailController@create')->name('detail.create');

Route::get('/detail-preset/create/{type}', 'DetailController@createPreset')->name('detail.create-preset');

Route::get('detail/{id}', 'DetailController@show')->name('detail.show');

Route::resource('detail', 'DetailController', ['except' => ['show', 'create','destroy']]);

// End Detail Routes

// Begin Emotion Routes

Route::get('all-emotions', 'AllEmotionsController@index');

Route::post('emotion-delete/{id}', 'EmotionController@destroy');

Route::get('/emotion/create', 'EmotionController@create')->name('emotion.create');

Route::get('emotion/{id}', 'EmotionController@show')->name('emotion.show');

Route::resource('emotion', 'EmotionController', ['except' => ['show', 'create','destroy']]);

// End Emotion Routes

// Emotion Expression Route

Route::get('emotion-expression/{type}', 'EmotionExpressionController@index')->name('emotion-expression.index');

// Begin Expression Routes

Route::get('api/expression-data', 'ApiController@expressionData')->middleware(['auth', 'admin']);

Route::post('expression-delete/{id}', 'ExpressionController@destroy');

Route::get('/expression/create', 'ExpressionController@create')->name('expression.create');

Route::get('/expression-preset/create/{type}', 'ExpressionController@createPreset')->name('expression.create-preset');

Route::get('expression/{id}', 'ExpressionController@show')->name('expression.show');

Route::resource('expression', 'ExpressionController', ['except' => ['show', 'create','destroy']]);

// End Expression Routes

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

Route::get('all-{type}', 'AllMediaLinksController@media')->name('all-media');

Route::post('media-link-delete/{id}', 'MediaLinkController@destroy');

Route::get('/media-link/create', 'MediaLinkController@create')->name('media-link.create');

Route::get('/media-link/create-preset/{type}', 'MediaLinkController@createPreset')->name('media-link.create-preset');

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

//  Seed Emotions  Do not uncomment -- dangerous

// Route::get('seed-emotions', 'SeedEmotionsController@index');

// Settings routes

Route::get('settings', 'SettingsController@edit');

Route::patch('settings', 'SettingsController@update')->name('user-update');

// Support Messages Routes

Route::get('support-messages', 'Contacts\MessagesController@index');

Route::get('support-messages-show/{message}', 'Contacts\MessagesController@show');



// Self-Publishing routes

Route::get('self-publishing', 'SelfPublishingController@index')->name('self-publishing.index');


// Begin Subcategory Routes

Route::post('subcategory-delete/{id}', 'SubcategoryController@destroy');

Route::get('/subcategory/create', 'SubcategoryController@create')->name('subcategory.create');

Route::get('subcategory/{id}', 'SubcategoryController@show')->name('subcategory.show');

Route::resource('subcategory', 'SubcategoryController', ['except' => ['show', 'create','destroy']]);

// End Subcategory Routes

// test routes

Route::get('test', 'TestController@index')->name('test.index');

// Unsubscribe Routes

Route::get('/unsubscribe', 'UnsubscribeController@edit')->name('unsubscribe');
Route::post('/unsubscribe', 'UnsubscribeController@store')->name('unsubscribe-store');
Route::get('/unsubscribe/confirmation', 'UnsubscribeController@confirm')->name('unsubscribe-confirmation');

// user routes

Route::post('user-delete/{id}', 'UserController@destroy');

Route::resource('user', 'UserController');






