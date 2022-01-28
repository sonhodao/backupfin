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


use App\Http\Controllers\FrontEnd\SearchController;
use \App\Http\Controllers\FrontEnd\PostController;
use \App\Http\Controllers\FrontEnd\ReviewController;
use \App\Http\Controllers\FrontEnd\DiscussionController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SysController;
use App\Models\Newsletter;

Route::group(
    ['middleware' => 'guest'], function () {
        Route::get('/cp_admin/login', 'AuthController@showLoginForm')->name('login');
        Route::post('/cp_admin/login', 'AuthController@login');
    }
);

Route::group(
    ['middleware' => ['auth', 'admin'], 'prefix' => 'cp_admin'], function () {
        Route::get('/', 'HomeController@index')->name('dashboard');
        Route::post('/cp_admin/logout', 'AuthController@logout')->name('logout');
        Route::resource('users', 'AdminController')->except('show');
        Route::get('profile/password', 'ProfileController@password')->name('profile.password');
        Route::put('profile/password', 'ProfileController@updatePassword');
        Route::resource('buyers', 'UserController')->except('show');
        Route::resource('roles', 'RoleController')->except(['create', 'show', 'edit']);

        // Admin Menu Item
        Route::get('menu_items', 'AdminMenuItemController@index')
        ->name('menu_items.index');
        Route::get('menu_items/edit/{id}', 'AdminMenuItemController@edit')
        ->name('menu_items.edit');
        Route::post('menu_items/update/{id}', 'AdminMenuItemController@update')
        ->name('menu_items.update');
        Route::post('menu_items/quick_update', 'AdminMenuItemController@quickUpdate')->name('menu_items.quick_update');

        Route::resource('categories', 'CategoryController')->except(['create', 'show', 'edit']);
        Route::get('posts/tags', 'PostController@tags')->name('posts.tags');
        Route::get('posts/export', 'PostController@export')->name('posts.export');
        Route::post('posts/quick_update', 'PostController@quickUpdate')->name('posts.quick_update');
        Route::resource('posts', 'PostController');
        Route::delete('posts/delete/{post}', 'PostController@delete')->name('posts.delete');

        Route::resource('settings', 'SettingController')->except(['create', 'show', 'edit']);
        Route::get('settings/log', 'SettingController@log')->name('settings.log');
        Route::post('settings/update', 'SettingController@update')->name('settings.update');

        Route::post('reviews/quick_update', [\App\Http\Controllers\ReviewController::class, 'quickUpdate'])
        ->name('reviews.quick_update');
        Route::resource('reviews', 'ReviewController');

        Route::get('discussion/get', [\App\Http\Controllers\DiscussionController::class, 'getData'])
        ->name('discussion.getData');
        Route::post('discussion/quick_update', [\App\Http\Controllers\DiscussionController::class, 'quickUpdate'])
        ->name('discussion.quick_update');
        Route::delete('discussion/delete', [\App\Http\Controllers\DiscussionController::class, 'destroy'])
        ->name('discussion.destroy');


        Route::post('sliders/quick_update', 'SliderController@quickUpdate')->name('sliders.quick_update');
        Route::resource('sliders', 'SliderController');

        // Route::delete('banners/', 'BannerController@destroyModel')->name('banners.delete_model');
        Route::post('banners/quick_update', 'BannerController@quickUpdate')->name('banners.quick_update');

        Route::post('banners/update_home', 'BannerController@updateHome')->name('banners.update_home');
        Route::get('banners/list/{type}/{id}', 'BannerController@listBanners');
        Route::resource('banners', 'BannerController');

        Route::resource('redirections', 'RedirectionController');
        Route::post('redirection/export', [\App\Http\Controllers\RedirectionController::class,'export'])->name('redirection.export');

        Route::resource('branches', 'BranchController');

        Route::post('seos/quick_update', 'SeoController@quickUpdate')->name('seos.quick_update');
        Route::resource('seos', 'SeoController');
        Route::resource('item_relates', 'ItemRelateController');
        Route::resource('accounts', 'AccountController');
        Route::get('blockaccount/{id}', 'AccountController@blockAccount')->name('block.account');
        Route::get('unblockaccount/{id}', 'AccountController@unblockAccount')->name('unblock.account');


        Route::get('posts/delete/list', 'PostController@deleteList')->name('posts.delete.list');
        Route::post('posts/delete/restore/{id}', 'PostController@restorePostDelete')->name('posts.delete.restore');



        Route::resource('pages', 'PageController')->except(['show']);
        Route::get('/pages/{page}/preview', 'PageController@preview');

        Route::post('banners/priority', 'BannerController@priority')->name('banners.priority');
        Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

        Route::post('branches_priority', 'BranchController@priority')->name('branches.priority');

        Route::get('menu', 'MenuController@index')->name('menus.index');

        // Ajax Chung

        Route::post('ajax/slug/', 'AjaxController@slug')->name('ajax.slug');

        // Text link

        Route::get('text_links/get_category', 'TextLinkController@getCategory')->name('text_links.get_category');
        Route::post('text_links/quick_update', 'TextLinkController@quickUpdate')->name('text_links.quick_update');
        Route::resource('text_links', 'TextLinkController')->except(['show']);
        Route::post('text_links/export', 'TextLinkController@export')->name('text_links.export');

        Route::get('contacts', 'ContactController@index')->name('contacts');
        Route::get('responded/{id}', 'ContactController@responded')->name('responded');
        Route::get('noresponseyet/{id}', 'ContactController@noResponseYet')->name('noResponseYet');

        //Navigation
        Route::resource('navigations', 'NavigationController');
        Route::post('update/{id}/{navigation}', 'NavigationController@updateNavigation')->name('navigations.updateNavigation');


        // xóa hết cache
        Route::get('clear-cache', [SysController::class, 'clearCache'])->name('clear-cache');
        Route::get('info', [SysController::class, 'info']);
        Route::get('update-price', [SysController::class, 'updatePrice']);

        // Home text
        Route::resource('home_texts', 'HomeTextController')->except(['create', 'show', 'edit']);
        Route::post('home_texts/update', 'HomeTextController@update')->name('home_texts.update');
        Route::get('home_texts/log', 'HomeTextController@log')->name('home_texts.log');

    }
);
Route::group(
    ['prefix' => 'account', 'middleware' => ['guestAccount', 'doNotCacheResponse']],
    function () {
        Route::get('/dang-ki', 'FrontEnd\AcountController@register')->name('fe.register');
        Route::post('/dang-ki', 'FrontEnd\AcountController@registerStore')->name('fe.register');

        Route::get('/dang-nhap', 'FrontEnd\AcountController@login')->name('fe.login');
        Route::post('/signIn', 'FrontEnd\AcountController@signIn')->name('fe.signIn');

        Route::get('/lay-lai-mat-khau', 'FrontEnd\AcountController@resetPassword')->name('fe.resetPassword');
        Route::post('/lay-lai-mat-khau', 'FrontEnd\AcountController@resetNewPassword')->name('fe.account.reset');

        Route::post('/gui-mail', 'FrontEnd\AcountController@sendMailReset')->name('fe.send.mail');
        Route::get('cap-nhat-lai-mat-khau', 'FrontEnd\AcountController@updateNewPassword')->name('fe.update.pass');

        Route::post('dang-nhap-popup', 'FrontEnd\AcountController@signInPopup')->name('fe.signin.popup');
    }
);
Route::get('/logout', 'FrontEnd\AcountController@logoutAccount')->name('fe.logout')->middleware('doNotCacheResponse');
Route::get('/login-popup', 'FrontEnd\AcountController@loginPopup')->name('fe.login.popup')->middleware('doNotCacheResponse');

Route::group(
    ['prefix' => 'thong-tin-tai-khoan', 'middleware' => 'account'],
    function () {
        Route::get('/', 'FrontEnd\AcountController@getAccountInfo')->name('fe.account.info');
        Route::get('/yeu-thich', 'FrontEnd\AcountController@wishlist')->name('fe.account.wishlist');
        Route::post('/sua-tai-khoan', 'FrontEnd\AcountController@editAccount')->name('fe.editAccount');
        Route::get('/chi-tiet', 'FrontEnd\AcountController@detail')->name('fe.account.detail');
        Route::get('/don-hang', 'FrontEnd\AcountController@order')->name('fe.account.order');
        Route::get('/dia-chi', 'FrontEnd\AcountController@address')->name('fe.account.address');
        Route::post('/cap-nhat-dia-chi', 'FrontEnd\AcountController@updateAddress')->name('fe.account.updateAddress');
    }
);

Route::get('/{social}/redirect/{provider}', 'FrontEnd\SocialController@redirect')->name('fe.login.social');
Route::get('/callback/{provider}', 'FrontEnd\SocialController@callback');

Route::post('locations/district', 'FrontEnd\LocationController@district')->name('locations.district');
Route::post('locations/ward', 'FrontEnd\LocationController@ward')->name('locations.ward');

Route::get('locations/district', 'LocationController@district')->name('locations.district')->middleware(getRouteCacheTags('locations.district'));
Route::get('locations/ward', 'LocationController@ward')->name('locations.ward')->middleware(getRouteCacheTags('locations.ward'));


Route::get('/', [HomeController::class, 'index'])->name('fe.home')->middleware(getRouteCacheTags('home'));
Route::get('/trang-chu', [HomeController::class, 'page'])->name('fe.home.page')->middleware(getRouteCacheTags('home.page'));
Route::post('/getPopular', [HomeController::class, 'popular'])->name('fe.post.getPopular')->middleware(getRouteCacheTags('getPopular'));

/**
 * ----Bài viết ---
*/

Route::get('/{slug}-e{id}.html', [PostController::class,'category'])->where(['slug' => '([÷a-zA-Z0-9\-]+)', 'id' => '(\d+)'])->name('fe.post.category')->middleware(getRouteCacheTags('fe.post.category'));
Route::get('/{slug}-{id}.html', [PostController::class,'show'])->where(['slug' => '(.*)', 'id' => '(\d+)'])->name('fe.post')->middleware(getRouteCacheTags('fe.post'));
Route::get('print/p{id}.html', [PostController::class,'print'])->where([ 'id' => '(\d+)'])->name('fe.post.print')->middleware(getRouteCacheTags('fe.post.print'));
Route::get('tag/{slug}.html', [PostController::class,'tag'])->where([ 'slug' => '([÷a-zA-Z0-9\-]+)'])->name('fe.post.tag')->middleware(getRouteCacheTags('fe.post.tag'));

/**
 * ---- Hết Bài viết ---
*/

Route::post('/postRatingImage', [ReviewController::class, 'postRatingImage'])->name('fe.postRatingImage');
Route::post('/submitRatingComment', [ReviewController::class, 'store'])->middleware('account')->name('fe.review.store');
Route::get('/reviews/index', [ReviewController::class, 'index'])->name('fe.review.index');
Route::get('/reviews/reply', [ReviewController::class, 'reply'])->name('fe.review.reply');
Route::post('/reviews/like', [ReviewController::class, 'like'])->name('fe.review.like');

/**
 * ---- Hết sản phẩm ---
*/

Route::get('tim-kiem', 'FrontEnd\SearchController@index')->name('fe.search.index')->middleware(getRouteCacheTags('fe.fe.search.index'));
Route::get('search/suggest', 'FrontEnd\SearchController@suggest')->name('fe.search.suggest')->middleware(getRouteCacheTags('fe.search.suggest'));

/**
 * ---- Page ---
*/
Route::get('p/{slug}-hp{id}.html', 'FrontEnd\PageController@show')->where(['slug' => '([÷a-zA-Z0-9\-]+)', 'id' => '(\d+)'])->name('fe.page.show')->middleware(getRouteCacheTags('fe.page.show'));
Route::get('lien-he', 'FrontEnd\ContactController@contact')->name('fe.contact');
Route::post('lien-he', 'FrontEnd\ContactController@submitContact')->name('fe.contact');
/**
 * ---- Sitemap ---
*/
Route::get('sitemap.xml', 'FrontEnd\SiteMapController@index')->name('fe.sitemap')->middleware(getRouteCacheTags('fe.sitemap'));
Route::get('sitemap_article.xml', 'FrontEnd\SiteMapController@posts')->name('fe.sitemap_article')->middleware(getRouteCacheTags('fe.sitemap_article'));
Route::get('sitemap_article_category.xml', 'FrontEnd\SiteMapController@categories')->name('fe.sitemap_article_category')->middleware(getRouteCacheTags('fe.sitemap_article_category'));
Route::get('sitemap_page.xml', 'FrontEnd\SiteMapController@page')->name('fe.sitemap_page')->middleware(getRouteCacheTags('fe.sitemap_page'));
/**
 * ---- Newsletter ---
*/
Route::post('post/newsletters', 'FrontEnd\NewsletterController@postNewsletter')->name('fe.newsletters');

Route::resource('newsletters', 'NewsletterController')->except('create', 'store', 'edit', 'update');
