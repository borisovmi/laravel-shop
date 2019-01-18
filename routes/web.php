<?php

/*
  Routes file, how it works:
  Router::method('if_you_see_this_in_URL', do_this)
 */

Route::get('/', "PagesController@getHomePage");



Route::prefix('shop')->group(function() {
    Route::get('/', "PagesController@getCategories");
    Route::get('addToCart', "ShopController@addToCart");
    Route::get('checkout', "ShopController@getCheckout");
    Route::get('clearCart', "ShopController@clearCart");
    Route::get('updateCart', "ShopController@updateCart");
    Route::get('saveorder', "ShopController@SaveOrder");
    Route::get('checkout/{sortType}', "ShopController@getCheckout");
    Route::get('deleteProduct/{product_id}', "ShopController@deleteProduct");
    Route::get('{cat_url}', "PagesController@getProducts");
    Route::get('{cat_url}/{product_url}', "PagesController@getItem");
});

Route::prefix('user')->group(function() {
    Route::get('logout', "UserController@logout");
    Route::get('signin', "UserController@getSignin");
    Route::get('signup', "UserController@getSignup");
    Route::post('userValidate', "UserController@userValidate");
    Route::post('userSignUp', "UserController@insertUser");
    Route::get('{user_id}', "UserController@getUserHome");
    Route::get('{user_id}/messages', "UserController@getMessages");
    Route::get('{user_id}/messages/{message_id}', "UserController@getMessageDetails");
    Route::get('{user_id}/messages/{message_id}/edit', "UserController@editAnswer");
    Route::post('{user_id}/messages/{message_id}/update', "UserController@updateAnswer");
    Route::get('{user_id}/profile', "UserController@getUserProfile");
    Route::get('{user_id}/profile/edit', "UserController@editUser");
    Route::put('{user_id}/profile/update', "UserController@updateUser");
    Route::get('{user_id}/orders', "UserController@getUserOrders");
    Route::get('{user_id}/orders/{order_id}', "UserController@getOrderDetails");
});

Route::prefix('contact-us')->group(function() {
    Route::get('', "PagesController@getContactUs");
    Route::post('sendMessage', "MessageController@sendMessage");
});



Route::middleware(['CheckAdmin'])->group(function() {
    Route::prefix('cms')->group(function() {
        Route::get('dashboard', "CmsController@ShowDashboard");
        Route::resource('menu', "MenuController");
        Route::resource('content', "ContentController");
        Route::resource('category', "CategoryController");
        Route::resource('product', "ProductController");
        Route::resource('user', "UserController");
        Route::resource('message', "MessageController");
        Route::get('message/{message_id}/details', "MessageController@getMessageDetails");
        Route::resource('order', "OrderController");
        Route::get('user/{user_id}/orders', "CmsController@getUserOrders");
        Route::get('user/{user_id}/orders/{order_id}', "CmsController@getOrder");
    });
});

Route::get('{page_url}', "PagesController@getPageByUrl");
