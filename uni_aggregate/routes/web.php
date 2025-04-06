<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EligibilityController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\CourseMasterController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\CourseController as FrontendCourseController;
use App\Http\Controllers\frontend\UniversityController as FrontendUniversityController;
use App\Http\Controllers\frontend\StudentAuthController as FrontendStudentAuthController;
use App\Http\Controllers\streamController;
use App\Http\Controllers\ConsultancyController;
use App\Http\Controllers\frontend\EligibilityChecker;
use App\Http\Controllers\frontend\GoogleAuthController;
use App\Http\Controllers\LatestInfoController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\TestController;

use App\Http\Controllers\FAQController;
use Illuminate\Support\Facades\Route;

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




Route::get('/admin', [AuthController::class, 'login'])->name('login');
Route::post('/post/signIn', [AuthController::class, 'save_sign_in'])->name('post.sign.in');


Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/edit/profile',[AuthController::class,'edit'])->name('edit.profile');
    Route::post('/update/password',[AuthController::class,'change_password'])->name('update.password');
    Route::post('/update/email',[AuthController::class,'change_email'])->name('update.email');



    //Course Master
    Route::get('/add/courses-master', [CourseMasterController::class, 'add'])->name('add.course_master');
    Route::get('/courses-master', [CourseMasterController::class, 'index'])->name('index.course_master');
    Route::get('/courses-master/edit/{slug}', [CourseMasterController::class, 'edit'])->name('edit.course_master');
    Route::post('/add/courses-master/save', [CourseMasterController::class, 'save_add'])->name('save.add.course_master');
    Route::post('/edit/courses-master/save/{slug}', [CourseMasterController::class, 'save_edit'])->name('save.edit.course_master');
    Route::post('/course_master/remove', [CourseMasterController::class, 'removeItem'])->name('remove.item.course_master');
    Route::post('datatables/course_master', [CourseMasterController::class, 'datatables'])->name('course_master.get');



    Route::get('/uni', [UniversityController::class, 'index'])->name('uni_list');
    Route::get('/add/uni', [UniversityController::class, 'add_uni'])->name('add.uni');
    Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');

    Route::post('/post/add_uni', [UniversityController::class, 'add_uni_save'])->name('post.add.uni');


    // edit Universities
    Route::get('/edit/uni/{slug}', [UniversityController::class, 'edit'])->name('uni.edit');
    Route::post('/post/edit_uni/{slug}', [UniversityController::class, 'edit_save'])->name('post.edit.uni');
    Route::post('/university/remove', [UniversityController::class, 'removeItem'])->name('remove.uni');

    Route::post('datatables/universities', [UniversityController::class, 'datatables'])->name('universities.get');



    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/add/courses', [CoursesController::class, 'add_courses'])->name('add.courses');

    Route::get('/courses', [CoursesController::class, 'index'])->name('courses.index');

    Route::get('/edit/course/{id}', [CoursesController::class, 'edit'])->name('course.edit');
    Route::post('/post/edit_courses', [CoursesController::class, 'edit_save'])->name('save.edit.course');


    Route::get('/remove/courses', [CoursesController::class, 'removeItem'])->name('courses.remove.item');

    Route::post('datatables/courses', [CoursesController::class, 'datatables'])->name('courses.get');

    Route::post('/save/add/courses', [CoursesController::class, 'save_add_course'])->name('save.add.course');
    Route::get('/fetch/facilities', [CoursesController::class, 'fetchFaculties'])->name('fetch.faculties');

    // Eligibility
    Route::get('/specify/eligibility', [EligibilityController::class, 'specifyEligibility'])->name('specify.eligibility');
    Route::get('/eligibility/edit/{id}', [EligibilityController::class, 'edit'])->name('edit.eligibility');
    Route::post('/eligibility/save/edit/{id}', [EligibilityController::class, 'save_edit'])->name('save.edit.eligibility');

    Route::post('/save/eligibility', [EligibilityController::class, 'save_specifyEligibility'])->name('save.specify.eligibility');

    Route::get('/eligibility', [EligibilityController::class, 'index'])->name('eligibility.index');

    Route::post('datatables/eligibilty', [EligibilityController::class, 'datatables'])->name('eligibility.get');
    Route::post('/eligibility/remove', [EligibilityController::class, 'removeItem'])->name('remove.item.eligibility');



    Route::get('/fetch/university', [EligibilityController::class, 'fetchUniversitites'])->name('fetch.universities');
    Route::get('/fetch-courses', [EligibilityController::class, 'fetchCourses'])->name('fetch.courses');
    Route::get('/fetch-state', [UniversityController::class, 'fetchStates'])->name('fetch.states');


    //Level
    Route::get('/level', [LevelController::class, 'index'])->name('level');
    Route::post('datatables/level', [LevelController::class, 'datatables'])->name('level.get');
    Route::get('/add/level', [LevelController::class, 'add_level'])->name('add.level');
    Route::get('/edit/level/{slug}', [LevelController::class, 'edit'])->name('edit.level');

    Route::post('/save/add/level', [LevelController::class, 'save_level'])->name('save.add.level');
    Route::post('/save/edit/level/{slug}', [LevelController::class, 'edit_save'])->name('save.edit.level');

    Route::post('/level/remove', [LevelController::class, 'removeItem'])->name('remove.item.level');


    //Board
    Route::get('/board', [BoardController::class, 'index'])->name('board');
    Route::post('datatables/board', [BoardController::class, 'datatables'])->name('board.get');
    Route::get('/add/board', [BoardController::class, 'add_board'])->name('add.board');
    Route::get('/edit/board/{slug}', [BoardController::class, 'edit'])->name('edit.board');

    Route::post('save/add/board', [BoardController::class, 'save_board'])->name('save.add.board');
    Route::post('save/edit/board/{slug}', [BoardController::class, 'edit_board'])->name('save.edit.board');
    Route::post('/board/remove', [BoardController::class, 'removeItem'])->name('remove.item.board');


    //States
    Route::get('/add/states', [HomeController::class, 'add_states'])->name('add.states');

    //Stream
    Route::get('/stream', [streamController::class, 'index'])->name('stream');
    Route::post('datatables/stream', [streamController::class, 'datatables'])->name('stream.get');
    Route::get('/add/stream', [streamController::class, 'add_stream'])->name('add.stream');
    Route::get('/edit/stream/{slug}', [streamController::class, 'edit'])->name('edit.stream');
    Route::post('save/add/stream', [streamController::class, 'save_stream'])->name('save.add.stream');
    Route::post('save/edit/stream/{slug}', [streamController::class, 'edit_save'])->name('save.edit.stream');
    Route::post('/stream/remove/', [streamController::class, 'removeItem'])->name('remove.item.stream');


    //Faculty
    Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty');
    Route::post('datatables/faculty', [FacultyController::class, 'datatables'])->name('faculty.get');
    Route::get('/add/faculty', [FacultyController::class, 'add_faculty'])->name('add.faculty');
    Route::get('/edit/faculty/{id}', [FacultyController::class, 'edit'])->name('edit.faculty');
    Route::post('/save/add/faculty', [FacultyController::class, 'save_faculty'])->name('save.add.faculty');
    Route::post('save/edit/faculty/{id}', [FacultyController::class, 'edit_save'])->name('save.edit.faculty');
    Route::post('/faculty/remove', [FacultyController::class, 'removeItem'])->name('remove.item.faculty');


    // test
    Route::controller(TestController::class)
        ->group(function () {
            Route::get('/test', 'index')->name('test');
            Route::post('/save/add/test', 'add_save')->name('save.add.test');
            Route::post('/test/datatables', 'datatables')->name('test.get');
            Route::get('/add/test', 'add')->name('add.test');
            Route::get('/test/edit/{slug}', 'edit')->name('test.edit');
            Route::post('/test/edit/save/{slug}', 'save_edit')->name('save.edit.test');
            Route::post('/test/remove',  'removeItem')->name('remove.item.test');
        });

    // faq
    Route::controller(FAQController::class)
        ->group(function () {
            Route::get('/faq/index', 'index')->name('faq');
            Route::post('/save/add/faq', 'add_save')->name('save.add.faq');
            Route::post('/test/datatables', 'datatables')->name('faq.get');
            Route::get('/add/faq', 'add')->name('add.faq');
            Route::get('/faq/edit/{id}', 'edit')->name('faq.edit');
            Route::post('/faq/edit/save/{id}', 'save_edit')->name('save.edit.faq');
            Route::post('/faq/remove',  'removeItem')->name('remove.item.faq');
        });
    Route::controller(LatestInfoController::class)
        ->group(function () {
            Route::get('/info', 'index')->name('info');
            Route::get('/info/add', 'add')->name('add.info');
            Route::get('/info/edit/{slug}', 'edit')->name('edit.info');
            Route::post('/info/add', 'store')->name('store.info');
            Route::post('/info/datatables', 'datatables')->name('info.get');
            Route::post('/info/update/{slug}', 'update')->name('update.info');
            Route::post('/info/remove', 'removeItem')->name('remove.info');
        });
    Route::controller(SiteSettingController::class)
        ->group(function () {
            Route::get('/site_setting', 'index')->name('site_setting');
            Route::get('/site_setting/add', 'add')->name('add.site_setting');
            Route::get('/site_setting/edit/{id}', 'edit')->name('edit.site_setting');
            Route::post('/site_setting/add', 'store')->name('store.site_setting');
            Route::post('/site_setting/datatables', 'datatables')->name('site_setting.get');
            Route::post('/site_setting/update', 'update')->name('update.site_setting');
            Route::post('/site_setting/remove', 'removeItem')->name('remove.site_setting');
        });
    Route::controller(AboutUsController::class)
        ->group(function () {

            Route::get('/aboutUs/edit', 'edit')->name('edit.aboutUs');


            Route::post('/aboutUs/update/', 'update')->name('update.aboutUs');

        });

    Route::controller(ConsultancyController::class)
        ->group(function () {
            Route::get('/consultancy', 'index')->name('consultancy.index');
            Route::get('/consultancy/add', 'add')->name('consultancy.add');
            Route::post('/consultancy/add/save', 'save_add')->name('save.add.consultancy');
            Route::get('/consultancy/edit/{slug}', 'edit')->name('consultancy.edit');
            Route::post('/consultancy/edit/save/{slug}', 'save_edit')->name('save.edit.consultancy');
            Route::post('/consultancy/datatables', 'datatables')->name('consultancy.get');
        });
});





// frontend

Route::controller(FrontendHomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('frontend.index');
        Route::get('/university/{slug}', 'uni_detail')->name('university.detail.frontend');
        Route::get('/course/{id}', 'course_detail')->name('course.detail.frontend');
        Route::get('/authorizedConsultancy/list', 'authorized_consultancy')->name('authorized_consultancy.frontend');
        Route::get('/Consultancy/{slug}', 'detail_consultancy')->name('authorized_consultancy.frontend.detail');
        Route::get('/test/{slug}', 'test_detail')->name('test.frontend.detail');
        Route::get('/faq', 'faq')->name('faq.index');
        Route::get('/latestInfo', 'latest_info')->name('latestInfo.index');
        Route::get('/about_index', 'about_us')->name('aboutUs.Index');
        Route::post('/consultancy/list/search', 'searchConsultancy')->name('consultancy.search');
    });

Route::get('/university/list/{slug}', [FrontendUniversityController::class, 'uni_by_country'])->name('uni.list');
Route::post('/university/list/search', [FrontendUniversityController::class, 'search'])->name('uni.search');
Route::get('/course_list', [FrontendCourseController::class, 'course_list'])->name('courses.list');
Route::post('/course_list/search', [FrontendCourseController::class, 'course_search'])->name('courses.search');



// Route::controller(FrontendStudentAuthController::class)
//     ->group(function () {
//     });



Route::controller(EligibilityChecker::class)
    ->group(function () {
        Route::post('/check-eligibility', 'check')->name('check.eligibility');
        Route::get('/results', 'result')->name('eligibility.result');
    });



// Frontend Login
    // Route::controller(FrontendStudentAuthController::Class)
//     ->group(function () {

//         Route::get('/login', 'user_login')->name('frontend.signin');
//         Route::post('/login/save', 'check_user')->name('frontend.signin.save');
//         Route::get('/register', 'register')->name('frontend.register');
//         Route::get('/logout', 'logout')->name('frontend.logout');
//         Route::post('/register/save', 'save_register')->name('frontend.register.save');
//     });
// Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('auth.google');
// Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
