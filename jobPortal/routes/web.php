<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CountryListController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsController;

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
//     return view('frontend.index');
// });
Route::get('/',[HomeController::class, 'homeIndex'])->name('home');

// Route::get('/about_us',[AboutUsController::class, 'aboutUs'])->name('about_us');
// Route::get('/message_from_chairman',[AboutUsController::class, 'messageFromChairperson'])->name('message_from_chairman');
//Dashboard
Route::get('/dashboard', function () {
    return view('frontend.dashboard.dashboard');
})->name('dashboard');

Route::get('/edit/profile', function () {
    return view('frontend.dashboard.edit_profile_employer');
})->name('edit.profile');

Route::get('/post/job',[HomeController::class, 'post_job'])->name('post.job');

Route::get('/edit/profile',[HomeController::class, 'edit_profile'])->name('edit.profile');

Route::post('/post/save',[HomeController::class, 'save_post_job'])->name('save.post.job');



Route::get('/',[HomeController::class, 'homeIndex'])->name('home');
Route::get('/about_us',[AboutUsController::class, 'aboutUs'])->name('about.us');
Route::get('/messageFromChairperson',[AboutUsController::class, 'messageFromChairperson'])->name('messageFromChairperson');
Route::get('/country_List',[CountryListController::class, 'countryList'])->name('country.list');
Route::get('/legal_document',[DocumentController::class, 'legalDocuments'])->name('legalDocument.list');
Route::get('/document_category',[DocumentController::class, 'categoryDocuments'])->name('categoryDocument.list');
Route::get('/contact_us',[ContactUsController::class, 'contactUs'])->name('contact.us');
Route::get('/jobs_category',[JobsCategoryController::class, 'jobsCategoryList'])->name('jobsCategory.List');
Route::get('/oversea_recruitment',[ServiceController::class, 'overseaRecruitment'])->name('oversea');
Route::get('/training&orientation',[ServiceController::class, 'training'])->name('training');
Route::get('/overseaRecruitment',[ServiceController::class, 'overseaRecruitment'])->name('oversea');
Route::get('/training & orientation',[ServiceController::class, 'training'])->name('training');
Route::get('/news',[NewsController::class, 'news'])->name('news');
//user register
Route::post('/user/register', [AuthController::class, 'user_register'])->name('user.register');
// user login
Route::post('/user/signin', [AuthController::class, 'user_login'])->name('user.signin');
// logout
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');





// put it in last
Route::get('{slug}', [AboutUsController::class, 'index'])->name('about_us');
