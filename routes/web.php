<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;
use App\Models\Customers;

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

// Route::group(['prefix' => 'add'], function () {
//     Route::get('/add_items', function () {
//         return view('views.AddItems');
//     });
//     Route::get('/add_users', function () {
//         return view('views.AddUsers');
//     });
//     Route::get('/add_customer', function () {
//         return view('views.AddCustomer');
//     });
// });



Route::get('/add_items', function () {
    return view('views.AddItems');
});
Route::get('/add_users', function () {
    return view('views.AddUsers');
});
Route::get('/add_customer', function () {
    return view('views.AddCustomer');
});


Route::get('/view_user', function () {
    return view('views.ViewUsers');
});
Route::get('/view_Customers', function () {
    return view('views.ViewCustomers');
});
Route::get('/view_items', function () {
    return view('views.ViewItems');
});

Route::post('/add_customer', [CustomerController::class, 'store']);
Route::post('/add_items',    [ItemController::class, 'store']);
Route::post('/add_user',     [UserController::class, 'store']);


Route::get('/view_Customers', [CustomerController::class, 'index']);
Route::get('/view_items',     [ItemController::class, 'index']);
Route::get('/view_user',      [UserController::class, 'index']);


Route::get('/update_customer', function () {
    return view('views.UpdateCustomers');
});

Route::get('/update_customer/{id}', [CustomerController::class, 'index1']);
Route::get('/update_item/{id}',     [ItemController::class, 'index1']);
Route::get('/update_user/{id}',     [UserController::class, 'index1']);

Route::post('/update_customer/{id}', [CustomerController::class, 'update']);
Route::post('/update_item/{id}',     [ItemController::class, 'update']);
Route::post('/update_user/{id}',     [UserController::class, 'update']);

// sale
Route::get('/sale', [CustomerController::class, 'index2']);
Route::get('/sale/{id}', [ItemController::class, 'index2']);
Route::post('/sale/{id}/order', [OrderController::class, 'store'])->name('updateSale');

Route::get('/home1', [ItemController::class, 'index3']);
Route::get('/print_data', [CustomerController::class, 'index4']);

Route::get('/print_order/{id}', [SaleController::class, 'index']);

Route::get('/customers_history/{id}', [CustomerController::class, 'index5']);
Route::get('/view_sales', [SaleController::class, 'index2']);


Route::get('/print', function () {
    return view('views.Print');
});

Route::get('/customers_history', function () {
    return view('views.ViewCustomerHistory');
});

Route::post('/view_Customers', [CustomerController::class, 'UpdateStatus'])->name('view_Customers.post');
Route::post('/view_items', [ItemController::class, 'UpdateStatus'])->name('view_items.post');

// view_Customers_table
Route::get('/view_Customers_table', [ItemController::class, 'index'])->name('view_Customers_table.get');
















Route::get('/', function () {
    return view('dashboard');
});

Route::group(['prefix' => 'email'], function () {
    Route::get('inbox', function () {
        return view('pages.email.inbox');
    });
    Route::get('read', function () {
        return view('pages.email.read');
    });
    Route::get('compose', function () {
        return view('pages.email.compose');
    });
});

Route::group(['prefix' => 'apps'], function () {
    Route::get('chat', function () {
        return view('pages.apps.chat');
    });
    Route::get('calendar', function () {
        return view('pages.apps.calendar');
    });
});

Route::group(['prefix' => 'ui-components'], function () {
    Route::get('accordion', function () {
        return view('pages.ui-components.accordion');
    });
    Route::get('alerts', function () {
        return view('pages.ui-components.alerts');
    });
    Route::get('badges', function () {
        return view('pages.ui-components.badges');
    });
    Route::get('breadcrumbs', function () {
        return view('pages.ui-components.breadcrumbs');
    });
    Route::get('buttons', function () {
        return view('pages.ui-components.buttons');
    });
    Route::get('button-group', function () {
        return view('pages.ui-components.button-group');
    });
    Route::get('cards', function () {
        return view('pages.ui-components.cards');
    });
    Route::get('carousel', function () {
        return view('pages.ui-components.carousel');
    });
    Route::get('collapse', function () {
        return view('pages.ui-components.collapse');
    });
    Route::get('dropdowns', function () {
        return view('pages.ui-components.dropdowns');
    });
    Route::get('list-group', function () {
        return view('pages.ui-components.list-group');
    });
    Route::get('media-object', function () {
        return view('pages.ui-components.media-object');
    });
    Route::get('modal', function () {
        return view('pages.ui-components.modal');
    });
    Route::get('navs', function () {
        return view('pages.ui-components.navs');
    });
    Route::get('navbar', function () {
        return view('pages.ui-components.navbar');
    });
    Route::get('pagination', function () {
        return view('pages.ui-components.pagination');
    });
    Route::get('popovers', function () {
        return view('pages.ui-components.popovers');
    });
    Route::get('progress', function () {
        return view('pages.ui-components.progress');
    });
    Route::get('scrollbar', function () {
        return view('pages.ui-components.scrollbar');
    });
    Route::get('scrollspy', function () {
        return view('pages.ui-components.scrollspy');
    });
    Route::get('spinners', function () {
        return view('pages.ui-components.spinners');
    });
    Route::get('tabs', function () {
        return view('pages.ui-components.tabs');
    });
    Route::get('tooltips', function () {
        return view('pages.ui-components.tooltips');
    });
});

Route::group(['prefix' => 'advanced-ui'], function () {
    Route::get('cropper', function () {
        return view('pages.advanced-ui.cropper');
    });
    Route::get('owl-carousel', function () {
        return view('pages.advanced-ui.owl-carousel');
    });
    Route::get('sortablejs', function () {
        return view('pages.advanced-ui.sortablejs');
    });
    Route::get('sweet-alert', function () {
        return view('pages.advanced-ui.sweet-alert');
    });
});

Route::group(['prefix' => 'forms'], function () {
    Route::get('basic-elements', function () {
        return view('pages.forms.basic-elements');
    });
    Route::get('advanced-elements', function () {
        return view('pages.forms.advanced-elements');
    });
    Route::get('editors', function () {
        return view('pages.forms.editors');
    });
    Route::get('wizard', function () {
        return view('pages.forms.wizard');
    });
});

Route::group(['prefix' => 'charts'], function () {
    Route::get('apex', function () {
        return view('pages.charts.apex');
    });
    Route::get('chartjs', function () {
        return view('pages.charts.chartjs');
    });
    Route::get('flot', function () {
        return view('pages.charts.flot');
    });
    Route::get('morrisjs', function () {
        return view('pages.charts.morrisjs');
    });
    Route::get('peity', function () {
        return view('pages.charts.peity');
    });
    Route::get('sparkline', function () {
        return view('pages.charts.sparkline');
    });
});

Route::group(['prefix' => 'tables'], function () {
    Route::get('basic-tables', function () {
        return view('pages.tables.basic-tables');
    });
    Route::get('data-table', function () {
        return view('pages.tables.data-table');
    });
});

Route::group(['prefix' => 'icons'], function () {
    Route::get('feather-icons', function () {
        return view('pages.icons.feather-icons');
    });
    Route::get('flag-icons', function () {
        return view('pages.icons.flag-icons');
    });
    Route::get('mdi-icons', function () {
        return view('pages.icons.mdi-icons');
    });
});

Route::group(['prefix' => 'general'], function () {
    Route::get('blank-page', function () {
        return view('pages.general.blank-page');
    });
    Route::get('faq', function () {
        return view('pages.general.faq');
    });
    Route::get('invoice', function () {
        return view('pages.general.invoice');
    });
    Route::get('profile', function () {
        return view('pages.general.profile');
    });
    Route::get('pricing', function () {
        return view('pages.general.pricing');
    });
    Route::get('timeline', function () {
        return view('pages.general.timeline');
    });
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('login', function () {
        return view('pages.auth.login');
    });
    Route::get('register', function () {
        return view('pages.auth.register');
    });
});

Route::group(['prefix' => 'error'], function () {
    Route::get('404', function () {
        return view('pages.error.404');
    });
    Route::get('500', function () {
        return view('pages.error.500');
    });
});

// Route::get('/clear-cache', function () {
//     Artisan::call('cache:clear');
//     return "Cache is cleared";
// });

// // 404 for undefined routes
// Route::any('/{page?}', function () {
//     return View::make('pages.error.404');
// })->where('page', '.*');
