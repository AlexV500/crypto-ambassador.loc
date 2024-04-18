<?php

use App\Services\Localization\LocalizationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::group(['prefix' => LocalizationService::locale(), 'middleware' => ['setLocale', 'LocaleRedirect']], function () {

  //  Livewire::setScriptRoute(function ($handle) { return Route::get('/livewire.js', $handle); });

    Livewire::setUpdateRoute(function ($handle) { return Route::post('/livewire/update', $handle); });

    Route::get('/', 'App\Livewire\ContactForm');
 //   Route::post('/', 'App\Livewire\ContactForm');
    Route::group(['namespace' => 'App\Http\Controllers\Contacts', 'prefix' => 'contacts'], function () {
        Route::post('/contacts', 'StoreController')->name('contacts.store');
    });


    Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
        Route::get('/', 'IndexController')->name('main.index');

    //    Route::get('/contact', ContactForm::class)->name('main.index.contacts');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function () {

        Route::group(['namespace' => 'Main'], function () {
             Route::get('/', 'IndexController')->name('blog.index');
        });

    });


    Route::group(['namespace' => 'App\Http\Controllers\Blog\Category', 'prefix' => 'category'], function () {

        Route::group(['namespace' => 'Post', 'prefix' => '{category:uri}'], function () {
            Route::get('/', 'IndexController')->name('blog.category.post.index');
        });
    });


    Route::group(['namespace' => 'App\Http\Controllers\Blog\Tag', 'prefix' => 'tag'], function () {

        Route::group(['namespace' => 'Post', 'prefix' => '{tag:uri}'], function () {
            Route::get('/', 'IndexController')->name('blog.tag.post.index');
        });
    });


    Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'post'], function () {
        Route::group(['namespace' => 'Post'], function () {
            Route::get('/{post:uri}', 'ShowController')->name('blog.post.show');
        });
        Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
            Route::post('/', 'StoreController')->name('blog.comment.store');
        });
        Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
            Route::post('/', 'StoreController')->name('blog.like.store');
        });
    });



    Route::middleware(['auth', 'verified'])->group(function () {
        Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal'], function () {
            Route::group(['namespace' => 'Main'], function () {
                Route::get('/', 'IndexController')->name('personal.main.index');
            });
            Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
                Route::get('/', 'IndexController')->name('personal.liked.index');
                Route::delete('/{post}', 'DeleteController')->name('personal.liked.delete');
            });
            Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function () {
                Route::get('/', 'IndexController')->name('personal.comment.index');
                Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
                Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
                Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
            });
        });
    });

    Auth::routes(['verify' => true]);

    Route::group(['namespace' => 'App\Http\Controllers\Socialite'], function () {
        Route::get('/login/linkedin', 'LinkedinController@linkedinRedirect')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
        Route::get('/login/linkedin/callback', 'LinkedinController@linkedinCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
        Route::get('/login/twitter', 'TwitterController@twitterRedirect')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
        Route::get('/login/twitter/callback', 'TwitterController@twitterCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
        Route::get('/login/google', 'GoogleController@googleRedirect')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
        Route::get('/login/google/callback', 'GoogleController@googleCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
        Route::get('/login/facebook', 'FacebookController@facebookRedirect')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
        Route::get('/login/facebook/callback', 'FacebookController@facebookCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
    });

    Route::middleware(['auth', 'admin', 'verified'])->group(function () {

        Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {

            Route::group(['namespace' => 'Main'], function () {
                Route::get('/', 'IndexController')->name('admin');
            });
            Route::group(['namespace' => 'Translate', 'prefix' => 'translate'], function () {
                Route::post('/', 'TranslateContentController')->name('admin.translate.content');
            });

            Route::group(['namespace' => 'Media\Images', 'prefix' => 'images'], function () {
                Route::post('/', 'UploadController')->name('admin.media.images.upload');
                Route::delete('/{image}', 'DeleteController')->name('admin.media.images.delete');
            });

            Route::group(['namespace' => 'Page', 'prefix' => 'pages'], function () {
                Route::get('/', 'IndexController')->name('admin.page.index');
                Route::get('/create', 'CreateController')->name('admin.page.create');
                Route::post('/', 'StoreController')->name('admin.page.store');
                Route::get('/{page}', 'ShowController')->name('admin.page.show');
                Route::get('/{page}/edit', 'EditController')->name('admin.page.edit');
                Route::patch('/{page}', 'UpdateController')->name('admin.page.update');
                Route::delete('/{page}', 'DeleteController')->name('admin.page.delete');
            });

            Route::group(['namespace' => 'Snippets', 'prefix' => 'snippets'], function () {
                Route::get('/', 'IndexController')->name('admin.snippets.index');
                Route::get('/create', 'CreateController')->name('admin.snippets.create');
                Route::post('/', 'StoreController')->name('admin.snippets.store');
                Route::get('/{snippet}', 'ShowController')->name('admin.snippets.show');
                Route::get('/{snippet}/edit', 'EditController')->name('admin.snippets.edit');
                Route::patch('/{snippet}', 'UpdateController')->name('admin.snippets.update');
                Route::delete('/{snippet}', 'DeleteController')->name('admin.snippets.delete');
            });

            Route::group(['namespace' => 'Blog'], function () {
                Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
                    Route::get('/', 'IndexController')->name('admin.blog.post.index');
                    Route::get('/create', 'CreateController')->name('admin.blog.post.create');
                    Route::post('/', 'StoreController')->name('admin.blog.post.store');
                    Route::get('/{post}', 'ShowController')->name('admin.blog.post.show');
                    Route::get('/{post}/edit', 'EditController')->name('admin.blog.post.edit');
                    Route::patch('/{post}', 'UpdateController')->name('admin.blog.post.update');
                    Route::delete('/{post}', 'DeleteController')->name('admin.blog.post.delete');
                });

                Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
                    Route::get('/', 'IndexController')->name('admin.blog.category.index');
                    Route::get('/create', 'CreateController')->name('admin.blog.category.create');
                    Route::post('/', 'StoreController')->name('admin.blog.category.store');
                    Route::get('/{category}', 'ShowController')->name('admin.blog.category.show');
                    Route::get('/{category}/edit', 'EditController')->name('admin.blog.category.edit');
                    Route::patch('/{category}', 'UpdateController')->name('admin.blog.category.update');
                    Route::delete('/{category}', 'DeleteController')->name('admin.blog.category.delete');
                });

                Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
                    Route::get('/', 'IndexController')->name('admin.blog.tag.index');
                    Route::get('/create', 'CreateController')->name('admin.blog.tag.create');
                    Route::post('/', 'StoreController')->name('admin.blog.tag.store');
                    Route::get('/{tag}', 'ShowController')->name('admin.blog.tag.show');
                    Route::get('/{tag}/edit', 'EditController')->name('admin.blog.tag.edit');
                    Route::patch('/{tag}', 'UpdateController')->name('admin.blog.tag.update');
                    Route::delete('/{tag}', 'DeleteController')->name('admin.blog.tag.delete');
                });
            });

            Route::group(['namespace' => 'Contacts', 'prefix' => 'contacts'], function () {
                Route::get('/', 'IndexController')->name('admin.contacts.index');
                Route::get('/{contact}', 'ShowController')->name('admin.contacts.show');
                Route::delete('/{contact}', 'DeleteController')->name('admin.contacts.delete');
            });

            Route::group(['namespace' => 'Menu'], function () {

                Route::group(['namespace' => 'MenuWidget', 'prefix' => 'menuwidgets'], function () {
                    Route::get('/', 'IndexController')->name('admin.menu.menuwidget.index');
                    Route::get('/create', 'CreateController')->name('admin.menu.menuwidget.create');
                    Route::post('/', 'StoreController')->name('admin.menu.menuwidget.store');
                    Route::get('/{menuWidget}', 'ShowController')->name('admin.menu.menuwidget.show');
                    Route::get('/{menuWidget}/edit', 'EditController')->name('admin.menu.menuwidget.edit');
                    Route::patch('/{menuWidget}', 'UpdateController')->name('admin.menu.menuwidget.update');
                    Route::delete('/{menuWidget}', 'DeleteController')->name('admin.menu.menuwidget.delete');
                });

                Route::group(['namespace' => 'MenuItem', 'prefix' => 'menuitems'], function () {
                    Route::get('/{menuWidget}', 'IndexController')->name('admin.menu.menuitem.index');
                    Route::get('/{menuWidget}/create', 'CreateController')->name('admin.menu.menuitem.create');
                    Route::post('/', 'StoreController')->name('admin.menu.menuitem.store');
                    Route::get('/{menuItem}/show', 'ShowController')->name('admin.menu.menuitem.show');
                    Route::get('/{menuItem}/edit', 'EditController')->name('admin.menu.menuitem.edit');
                    Route::get('/{menuItem}/binding', 'BindingController')->name('admin.menu.menuitem.binding');
                    Route::patch('/{menuItem}/bindItem', 'BindItemController')->name('admin.menu.menuitem.binditem');
                    Route::get('/{menuWidget}/{menuItem}/positionUp', 'PositionUpController')->name('admin.menu.menuitem.positionUp');
                    Route::get('/{menuWidget}/{menuItem}/positionDown', 'PositionDownController')->name('admin.menu.menuitem.positionDown');
                    Route::patch('/{menuItem}', 'UpdateController')->name('admin.menu.menuitem.update');
                    Route::delete('/{menuItem}', 'DeleteController')->name('admin.menu.menuitem.delete');
                });

                Route::group(['namespace' => 'SubMenuItem', 'prefix' => 'submenuitems'], function () {
                    Route::get('/{menuWidget}/{parentItem}', 'IndexController')->name('admin.menu.submenuitem.index');
                    Route::get('/{menuWidget}/{parentItem}/create', 'CreateController')->name('admin.menu.submenuitem.create');
                    Route::post('/', 'StoreController')->name('admin.menu.submenuitem.store');
                    Route::get('/{menuWidget}/{menuItem}/show', 'ShowController')->name('admin.menu.submenuitem.show');
                    Route::get('/{menuWidget}/{menuItem}/edit', 'EditController')->name('admin.menu.submenuitem.edit');
                    Route::get('/{menuWidget}/{menuItem}/positionUp', 'PositionUpController')->name('admin.menu.submenuitem.positionUp');
                    Route::get('/{menuWidget}/{menuItem}/positionDown', 'PositionDownController')->name('admin.menu.submenuitem.positionDown');
                    Route::get('/{menuWidget}/{menuItem}/visible', 'VisibleController')->name('admin.menu.submenuitem.visible');
                    Route::patch('/{menuItem}', 'UpdateController')->name('admin.menu.submenuitem.update');
                    Route::delete('/{menuItem}', 'DeleteController')->name('admin.menu.submenuitem.delete');
                });
            });

            Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
                Route::get('/', 'IndexController')->name('admin.user.index');
                Route::get('/create', 'CreateController')->name('admin.user.create');
                Route::post('/', 'StoreController')->name('admin.user.store');
                Route::get('/{user}', 'ShowController')->name('admin.user.show');
                Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
                Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
                Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
            });
        });
    });

});

Route::get('/storage-link', function() {
    Artisan::call('storage:link');
});

Route::post('/transliterate-uri', function() {
    return URIHelper::transliterateUri();
});




//Route::get('/auth/redirect', function () {
//    return Socialite::driver('github')->redirect();
//});

//Route::group(['namespace' => 'App\Http\Controllers\Auth'], function () {
//    Route::get('/login/{social}', 'LoginController@socialLogin')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
//    Route::get('/login/{social}/callback', 'LoginController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
//});



//Route::get('/email/verify', function () {
//    return view('auth.verify-email');
//})->middleware('auth')->name('verification.notice');
//
//Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//    $request->fulfill();
//
//    return redirect('/home');
//})->middleware(['auth', 'signed'])->name('verification.verify');

//Route::get('/', function () {
//    return view('welcome');
//});



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
