<?php
//route to clear cache
Route::get('/clear', function() {
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');
   Artisan::call('route:clear');
   return "Cleared!";
});
//socialite
Route::get('login/github', 'User\UserControllers@redirectToProvider')->name('login-by-facebook');
Route::get('login/github/callback', 'User\UserControllers@handleProviderCallback')->name('login-by-twitter');

///------------------------------------------------------------------------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
///-------------------------------------------------USER ROUTES-----------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
Auth::routes();
//cities ajax
Route::post('cities','User\UserControllers@cities')->name('cities');
//add-listing-data
Route::post('add-listing-data','User\UserControllers@add_listing_data')->name('add-listing-data');
//images upload by fropzone
Route::post('check','User\UserControllers@check')->name('check');

Route::get('/home','HomeController@index')->name('home');

//delete_user_images
Route::post('delete-user-images','User\UserControllers@delete_user_images')->name('delete_user_images');
//update_listing_data
Route::post('update-listing_data','User\UserControllers@update_listing_data')->name('update_listing_data');
//delete_day_time
Route::post('delete-day_time','User\UserControllers@delete_day_time')->name('delete_day_time');
//search_deals
Route::post('search_deals','User\UserControllers@search_deals')->name('search_deals');
//search_deals
Route::get('deal_details/{id}','User\UserControllers@deal_details')->name('deal_details');
//User_login
Route::post('User_login','User\UserControllers@User_login')->name('User_login');
//login
Route::get('SignIn','User\UserControllers@SignIn')->name('SignIn');
//blog-details
Route::get('blog-details/{id}','User\UserControllers@blog_details')->name('blog-details');
//delete-listing
Route::post('delete-listing','User\UserControllers@delete_listing')->name('delete-listing');
//search-blog
Route::post('search-blog','User\UserControllers@search_blog')->name('search-blog');
//blog-tag-search
Route::post('blog-tag-search','User\UserControllers@blog_tag_search')->name('blog-tag-search');
//blog_comment
Route::post('blog_comment','User\UserControllers@blog_comment')->name('blog_comment');
//UserLogout
Route::get('UserLogout','User\UserControllers@user_logout')->name('user_logout');
//contact-email
Route::post('contact-email','User\UserControllers@contact_email')->name('contact-email');
//edit_profile_data
Route::post('reset-password','User\UserControllers@reset_password')->name('reset_password');
/////////////////////////////////////////////////////////////////////////////////////////

Route::group(['middleware'=>'CheckForIndex'], function(){ 

//home
Route::get('/','User\UserControllers@index')->name('/');
//contact
Route::get('contact','User\UserControllers@contact')->name('contact');
//About Us
Route::get('AboutUs','User\UserControllers@AboutUs')->name('AboutUs');

//terms
Route::get('terms','User\UserControllers@terms')->name('terms');
//privacy-policy
Route::get('privacy-policy','User\UserControllers@privacy_policy')->name('privacy-policy');
//blogs
Route::get('blogs','User\UserControllers@blogs')->name('blogs');
//blog-detail
Route::get('blog-detail','User\UserControllers@blog_detail')->name('blog-detail');
//forgot password
Route::get('forgot-password','User\UserControllers@forgot_password')->name('forgot-password');

//RegisterData
Route::post('RegisterData','User\UserControllers@RegisterData')->name('RegisterData');
//deals
Route::get('deals','User\UserControllers@deals')->name('deals');
//register
Route::get('UserRegister','User\UserControllers@register')->name('User_register');
//password reset link
Route::get('password-reset','User\UserControllers@password_reset')->name('password-reset');
//change password
Route::post('change-password','User\UserControllers@change_password')->name('change-password');

//categories
Route::get('categories','User\UserControllers@categories')->name('categories');		
//listing
Route::get('listing/{id}','User\UserControllers@listing')->name('listing');
//listing-detail
Route::get('listing-detail/{id}','User\UserControllers@listing_detail')->name('listing-detail');
//all listings
Route::get('all-listings','User\UserControllers@all_listings')->name('all-listings');
//filter_listings
Route::post('filter-listings','User\UserControllers@filter_listings')->name('filter_listings');
//search-listings
Route::match(['get', 'post'],'search-listings','User\UserControllers@search_listings')->name('search-listings');
//search-listings
Route::match(['get', 'post'],'search-by-tag/{id}','User\UserControllers@search_by_tag')->name('search-by-tag');

 }); 
///------------------------------------------------------------------------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
///-------------------------------------------------USER AUTHENTICATED ROUTES----------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
Route::group(['middleware'=>'UserCheck'], function(){ 
//edit profile
Route::get('edit-profile','User\UserControllers@edit_profile')->name('edit-profile');

//edit-listing
Route::get('edit-listing/{id}','User\UserControllers@edit_listing')->name('edit-listing');

//edit_profile_data
Route::post('edit-profile_data','User\UserControllers@edit_profile_data')->name('edit_profile_data');
//Add_to_favorites
Route::match(['get', 'post'],'Add_to_favorites','User\UserControllers@Add_to_favorites')->name('Add_to_favorites');
//favourite_listings
Route::get('favourite-listings','User\UserControllers@favourite_listings')->name('favourite_listings');
//remove_favourite_listings
Route::post('remove-favourite_listings','User\UserControllers@remove_favourite_listings')->name('remove_favourite_listings');
//rating
Route::post('rating','User\UserControllers@rating')->name('rating');
//add_listing
Route::get('add-listing','User\UserControllers@add_listing')->name('add-listing');
 });
//
///------------------------------------------------------------------------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
///-------------------------------------------------ADMIN ROUTES-----------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///

//login page
Route::get('admin/login','Admin\AdminController@login')->name('adminlogin');
Route::post('adminauth','Admin\AdminController@adminauth')->name('adminauth');
//------------------------------------//
                                     //
//--middleware and admin route group//
                                   // 
//--------------------------------//
Route::group(['prefix' => 'admin','as'=>'adm.','middleware'=>'checkadmin'], function(){   
Route::get('/','Admin\AdminController@index')->name('admin');
Route::get('logout','Admin\AdminController@logout')->name('logout');
Route::get('profile-settings','Admin\AdminController@profile_settings')->name('profile-settings');
Route::post('profile-changes','Admin\AdminController@profile_changes')->name('profile-changes');
Route::get('users','Admin\AdminController@users')->name('users');
Route::get('listing','Admin\AdminController@listing')->name('listing');
Route::get('user-details/{id}','Admin\AdminController@user_details')->name('user-details');
Route::post('delete-user','Admin\AdminController@delete_user')->name('delete-user');
Route::get('edit-user/{id}','Admin\AdminController@edit_user')->name('edit-user');
Route::post('save-user-changes/{id}','Admin\AdminController@save_user_changes')->name('save-user-changes');
Route::get('add-user','Admin\AdminController@add_user')->name('add-user');
Route::post('add-user-detailes','Admin\AdminController@add_user_detailes')->name('add-user-detailes');
Route::post('user-status','Admin\AdminController@user_status')->name('user-status');
Route::get('edit-listing/{id}','Admin\AdminController@edit_listing')->name('edit-listing');
Route::get('add-listing','Admin\AdminController@add_listing')->name('add-listing');
Route::get('categories','Admin\AdminController@list_categories')->name('categories');
Route::get('view-listing/{id}','Admin\AdminController@view_listing')->name('view-listing');
Route::get('blogs','Admin\AdminController@blog_listing')->name('blogs');
Route::get('add-blog','Admin\AdminController@add_blog')->name('add-blog');
Route::get('edit-blog/{id}','Admin\AdminController@edit_blog')->name('edit-blog');
Route::get('all-pages','Admin\AdminController@all_pages')->name('all-pages');
Route::get('add-page','Admin\AdminController@add_page')->name('add-page');
Route::get('edit-page','Admin\AdminController@edit_page')->name('edit-page');
Route::get('notifications','Admin\AdminController@notifications')->name('notifications');
Route::get('deals','Admin\AdminController@deals')->name('deals');
Route::get('edit-deals/{id}','Admin\AdminController@edit_deals')->name('edit-deals');
Route::get('add-deal','Admin\AdminController@add_deal')->name('add-deal');
Route::get('tags','Admin\AdminController@list_tags')->name('tags');
Route::get('edit_category','Admin\AdminController@edit_category')->name('edit_category');

Route::post('addsss-category','Admin\AdminController@addcategory')->name('addsss-category');
Route::post('edit-category','Admin\AdminController@editcategory')->name('edit-category');
Route::post('delete-category','Admin\AdminController@delete_category')->name('delete-category');

Route::post('select_category','Admin\AdminController@select_category')->name('select_category');

Route::get('country','Admin\AdminController@country')->name('country');
Route::post('add-country','Admin\AdminController@addcountry')->name('add-country');
Route::post('delete_country','Admin\AdminController@delete_country')->name('delete_country');
Route::post('select_country','Admin\AdminController@select_country')->name('select_country');
Route::post('editcountry','Admin\AdminController@editcountry')->name('editcountry');


Route::get('state','Admin\AdminController@state')->name('state');
Route::post('addstate','Admin\AdminController@addstate')->name('addstate');
Route::post('select_state','Admin\AdminController@select_state')->name('select_state');
Route::post('editstate','Admin\AdminController@editstate')->name('editstate');
Route::post('delete_state','Admin\AdminController@delete_state')->name('delete_state');

Route::post('insert_deal','Admin\AdminController@insert_deal')->name('insert_deal');
Route::post('update_deal/{id}','Admin\AdminController@update_deal')->name('update_deal');
Route::post('delete_deal','Admin\AdminController@delete_deal')->name('delete_deal');
Route::post('getstate','Admin\AdminController@getstate')->name('getstate');

//listings status change
Route::post('change_listing_status','Admin\AdminController@change_listing_status')->name('change_listing_status');
//add_listing_admin
Route::post('add_listing_admin','Admin\AdminController@add_listing_admin')->name('add_listing_admin');
//delete_rating
Route::post('delete_rating','Admin\AdminController@delete_rating')->name('delete_rating');
//rating_modal
Route::get('rating_modal/{id}','Admin\AdminController@rating_modal')->name('rating_modal');
//update_rating
Route::post('update_rating','Admin\AdminController@update_rating')->name('update_rating');
//add_review
Route::post('add_review','Admin\AdminController@add_review')->name('add_review');
//seen_notification
Route::post('seen_notification','Admin\AdminController@seen_notification')->name('seen_notification');
// change_user_status
Route::post('change_user_status','Admin\AdminController@change_user_status')->name('change_user_status');
//view_blog
Route::get('view_blog/{id}','Admin\AdminController@view_blog')->name('view_blog');
//delete_notification
Route::post('delete_notification','Admin\AdminController@delete_notification')->name('delete_notification');
//messages
Route::get('messages','Admin\AdminController@messages')->name('messages');
//delete_messages
Route::post('delete_messages','Admin\AdminController@delete_messages')->name('delete_messages');
//view_message
Route::get('view_message/{id}','Admin\AdminController@view_message')->name('view_message');
//view_message
Route::post('for_home_text','Admin\AdminController@for_home_text')->name('for_home_text');

// pages //

Route::get('contact','Admin\AdminController@contact_us')->name('contact');
Route::get('terms','Admin\AdminController@terms')->name('terms');
Route::get('privacy_policy','Admin\AdminController@privacy_policy')->name('privacy_policy');
Route::get('about_us','Admin\AdminController@about_us')->name('about_us');
Route::get('home','Admin\AdminController@home')->name('home');
Route::post('add_update_contactus','Admin\AdminController@add_update_contactus')->name('add_update_contactus');
Route::post('save_terms','Admin\AdminController@save_terms')->name('save_terms');
Route::post('save_privacy','Admin\AdminController@save_privacy')->name('save_privacy');
Route::post('save_about_us','Admin\AdminController@save_about_us')->name('save_about_us');
Route::post('save_home','Admin\AdminController@save_home')->name('save_home');
Route::post('edit_home_image','Admin\AdminController@edit_home_image')->name('edit_home_image');
Route::post('select_home_image','Admin\AdminController@select_home_image')->name('select_home_image');
Route::post('delete_home_image','Admin\AdminController@delete_home_image')->name('delete_home_image');
Route::post('save_tags','Admin\AdminController@save_tags')->name('save_tags');
Route::post('edit_tag','Admin\AdminController@edit_tag')->name('edit_tag');
Route::post('select_tag','Admin\AdminController@select_tag')->name('select_tag');
Route::post('delete_tags','Admin\AdminController@delete_tags')->name('delete_tags');
Route::post('save_blog','Admin\AdminController@save_blog')->name('save_blog');
Route::post('update_blog/{id}','Admin\AdminController@update_blog')->name('update_blog');
Route::post('delete_blog','Admin\AdminController@delete_blog')->name('delete_blog');

Route::get('view_blog_comment','Admin\AdminController@view_blog_comment')->name('view_blog_comment');
Route::post('delete_comment','Admin\AdminController@delete_comment')->name('delete_comment');

Route::get('listing_review','Admin\AdminController@listing_review')->name('listing_review');
Route::post('delete_listing_reviews','Admin\AdminController@delete_listing_reviews')->name('delete_listing_reviews');

});

///------------------------------------------------------------------------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
///-------------------------------------------------API ROUTES-----------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///
///------------------------------------------------------------------------------------------------------------------///    
Route::group(['prefix' => 'api'], function(){  
Route::post('userlistings','Api\ApiController@my_listings');
Route::post('loginUser','Api\ApiController@loginUser');
Route::post('profile','Api\ApiController@profile');
Route::post('register','Api\ApiController@register');
Route::post('forgot-password','Api\ApiController@reset_password');
Route::post('password-reset','Api\ApiController@password_reset');
Route::post('new-password','Api\ApiController@new_password');
Route::post('add-listing-data','Api\ApiController@add_listing_data');
Route::post('businesses','Api\ApiController@businesses');
Route::post('categories','Api\ApiController@categories');
Route::post('cat-tag','Api\ApiController@cat_tag');
Route::post('category_based_listing','Api\ApiController@category_based_listing');
Route::post('businesses-detail','Api\ApiController@businesses_detail');
Route::post('rating','Api\ApiController@rating');
Route::post('fav','Api\ApiController@fav');
Route::post('blogs','Api\ApiController@blogs');
Route::post('blog-details','Api\ApiController@blog_details');
Route::post('deals','Api\ApiController@deals');
Route::post('deal-details','Api\ApiController@deal_details');
Route::post('test','Api\ApiController@test');
Route::post('update-profile','Api\ApiController@update_profile');
Route::post('uploads','Api\ApiController@uploads');
Route::post('search-main','Api\ApiController@search_main');
Route::post('filter-listings','Api\ApiController@filter_listings');
Route::get('get_locations','Api\ApiController@get_locations');
Route::post('detail_search','Api\ApiController@detail_search');
Route::post('edit-listing-data','Api\ApiController@edit_listing_data');
Route::post('delete-lisiting','Api\ApiController@delete_lisiting');
Route::post('edit-listing','Api\ApiController@edit_listing');
Route::post('add-to-favorite','Api\ApiController@Add_to_favorites');
Route::post('remove-favourite-listings','Api\ApiController@remove_favourite_listings');
Route::post('get-all-favourites','Api\ApiController@get_all_favourites');
Route::get('getstates/{id}','Api\ApiController@getstates');
Route::post('checkapi','Api\ApiController@checkapi');
Route::post('filter-deals','Api\ApiController@filter_deals');
Route::get('test',function(){echo'yes';});
Route::get('contact','User\UserControllers@contact')->name('contact');
Route::get('test','User\UserControllers@test')->name('test');
Route::post('nearest_busi','Api\ApiController@nearest_busi');
});