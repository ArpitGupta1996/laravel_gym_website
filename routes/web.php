<?php

use App\Http\Controllers\AutoCompleteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CountryStateCityController;
use App\Http\Controllers\DisneyplusController;
use App\Http\Controllers\DropdownController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalscorerController;
use App\Http\Controllers\HighchartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostGuzzleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RetailController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('chempionleaque',GoalscorerController::class);

Route::get('/', [HomeController::class,'index']);

Route::get('about', [HomeController::class,'about'])->name('about');

Route::get('service', [HomeController::class,'service'])->name('service');

Route::get('testimonial', [HomeController::class, 'testimonial'])->name('testimonial');

Route::get('contact',[HomeController::class, 'contact'])->name('contact');

Route::put('save-contact', [HomeController::class, 'save'])->name('savecontact');


Route::get('posts1', [PostGuzzleController::class, 'index']);
Route::get('posts/store1',[PostGuzzleController::class, 'store']);

######################################### auto complete search starts here ############

Route::get('search', [AutoCompleteController::class, 'index'])->name('search');
Route::get('autocomplete',[AutoCompleteController::class,'autocomplete'])->name('autocomplete');

################################# auto complete search finish here ####################

##############################  image upload and preview starts from here ############

Route::get('image-upload-preview', [ImageUploadController::class, 'index']);
Route::post('upload-image', [ImageUploadController::class, 'store']);

#############################  till hereimage upload and preview  #################

######################################   Get State as per country ###################

Route::get('country-state-city', [CountryStateCityController::class, 'index']);
Route::post('get-states-by-country', [CountryStateCityController::class, 'getState']);
Route::post('get-cities-by-state',[CountryStateCityController::class,'getCity']);

#####################################  Till Here ##############################

#######################################   Generate PDF  ####################

Route::get('disneyplus', [DisneyplusController::class, 'create'])->name('disneyplus.create');
Route::post('disneyplus',[DisneyplusController::class, 'store'])->name('disneyplus.store');
Route::get('disneyplus/list',[DisneyplusController::class, 'index'])->name('disneyplus.index');
Route::get('/downloadPDF/{id}',[DisneyplusController::class, 'downloadPDF']);

######################################### Generate PDF Till here ##########

###################### newsletter ####################
Route::get('newsletter', [NewsletterController::class, 'create']);
Route::post('newsletter', [NewsletterController::class, 'store']);
#################till news letter ###################

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::get('posts',[PostController::class,'index']);
    Route::post('posts', [PostController::class,'store'])->name('posts.store');

    Route::get('email', [HomeController::class, 'email']);

    #roles and permission create routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);


    Route::get('sidebar', [RetailController::class, 'index']);
});


####################Country Suggestion ############

Route::get('country', function(){
    return view('country');
});

Route::get('location', [UserController::class, 'location']);


##################### Blog starts from here ############

Route::get('posts1',[BlogController::class, 'index']);
Route::get('create1', [BlogController::class, 'create']);
Route::post('store1', [BlogController::class, 'store']);

################ File upload with progress bar

Route::get('ajax-file-upload-progress-bar', [UploadFileController::class,'index']);
Route::post('store', [UploadFileController::class, 'store']);


#####################  Highcharts Implementation ###################
Route::get('/chart', [HighchartController::class,'handleChart']);

#####################  Send mail with PDF attachment #########
Route::get('send-email-with-pdf', [PDFController::class, 'index']);


Route::resource('admin-panel',(HomeController::class));


Route::get('autocomplete', [HomeController::class, 'index1']);


Route::get('multiple-select',[HomeController::class, 'multipleselect']);




Route::get('dropdown',[DropdownController::class, 'index']);
Route::get('getState',[DropdownController::class, 'getState'])->name('getState');
Route::get('getCity',[DropdownController::class, 'getCity'])->name('getCity');
