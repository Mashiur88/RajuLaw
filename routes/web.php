<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Aboutus\Index as AboutusIndex;
use App\Http\Livewire\Appointment\BackendAppoitment;
use App\Http\Livewire\Contactinfo\Index as ContactinfoIndex;
use App\Http\Livewire\Contactmessage\Index as ContactmessageIndex;
use App\Http\Livewire\CoreValue\Index as CoreValueIndex;
use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Livewire\Faq\FaqContent;
use App\Http\Livewire\Faq\Index as FaqIndex;
use App\Http\Livewire\Frontend\AboutUs;
use App\Http\Livewire\Frontend\Appointment;
use App\Http\Livewire\Frontend\Appointment2;
use App\Http\Livewire\Frontend\BlogList;
use App\Http\Livewire\Frontend\BlogSingle;
use App\Http\Livewire\Frontend\ContactUs;
use App\Http\Livewire\Frontend\Faq;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\LegalFees;
use App\Http\Livewire\Frontend\Search;
use App\Http\Livewire\Frontend\SingleService;
use App\Http\Livewire\Frontend\Team;
use App\Http\Livewire\Guideline\Create as GuidelineCreate;
use App\Http\Livewire\Guideline\Edit as GuidelineEdit;
use App\Http\Livewire\Guideline\Index as GuidelineIndex;
use App\Http\Livewire\ImmigrationNews\Create as ImmigrationNewsCreate;
use App\Http\Livewire\ImmigrationNews\Edit as ImmigrationNewsEdit;
use App\Http\Livewire\ImmigrationNews\Index as ImmigrationNewsIndex;
use App\Http\Livewire\LegalFees\Create as LegalFeesCreate;
use App\Http\Livewire\LegalFees\Edit as LegalFeesEdit;
use App\Http\Livewire\LegalFees\Index as LegalFeesIndex;
use App\Http\Livewire\MeetRaju\Index as MeetRajuIndex;
use App\Http\Livewire\Service\CreateServiceChild;
use App\Http\Livewire\Service\Index as ServiceIndex;
use App\Http\Livewire\Service\ServiceChild;
use App\Http\Livewire\Service\ServiceCreate;
use App\Http\Livewire\Setting\Index as SettingIndex;
use App\Http\Livewire\Team\Create;
use App\Http\Livewire\Team\Edit;
use App\Http\Livewire\Team\Index;
use App\Http\Livewire\Tech\Index as TechIndex;
use App\Http\Livewire\Testimonial\Index as TestimonialIndex;
use App\Http\Livewire\Users\Create as UsersCreate;
use App\Http\Livewire\Users\Edit as UsersEdit;
use App\Http\Livewire\Users\Index as UsersIndex;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Auth::routes(['register' => false]);
});

Route::get('/clear_cache', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('storage:link');
return 'Clear Cache';
});


// backend
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/adminDashboard', Dashboard::class)->name('admin_dashboard');
    Route::get('team_create', Create::class)->name('team_create');
    Route::get('all_member', Index::class)->name('all_member');
    Route::get('edit_member/{member_id}', Edit::class)->name('edit_member');
    // service
    Route::get('all_service', ServiceIndex::class)->name('all_service');
    Route::get('chield_data/{parent_id}', ServiceChild::class)->name('chield_data');
    Route::get('update_service/{props_service_id}', ServiceCreate::class)->name('update_service');
    Route::get('create_service_child/{props_service_id}', CreateServiceChild::class)->name('create_service_child');
    //FAQ
    Route::get('all_faq', FaqIndex::class)->name('all_faq');
    Route::get('create_legal_fees', LegalFeesCreate::class)->name('create_legal_fees');
    Route::get('edit_legal_fees/{id}', LegalFeesEdit::class)->name('edit_legal_fees');
    Route::get('faq_content/{parent_id}', FaqContent::class)->name('faq_content');
    //FAQ
    Route::get('ligal_fees', LegalFeesIndex::class)->name('ligal_fees');
    //client feedback
    Route::get('all_testimonial', TestimonialIndex::class)->name('all_testimonial');
    //tech section
    Route::get('tech', TechIndex::class)->name('tech');
    //raju meet section
    Route::get('raju_meet', MeetRajuIndex::class)->name('raju_meet');
    //news
    Route::get('all_immigration_news', ImmigrationNewsIndex::class)->name('all_immigration_news');
    Route::get('create_immigration_news', ImmigrationNewsCreate::class)->name('create_immigration_news');
    Route::get('edit_immigration_news/{edit_id}', ImmigrationNewsEdit::class)->name('edit_immigration_news');
    // setting
    Route::get('setting', SettingIndex::class)->name('setting');
    // guide line
    Route::get('all_guideline', GuidelineIndex::class)->name('all_guideline');
    Route::get('create_guideline', GuidelineCreate::class)->name('create_guideline');
    Route::get('edit_guideline/{edit_id}', GuidelineEdit::class)->name('edit_guideline');
    // admin user
    Route::get('all_user', UsersIndex::class)->name('all_user');
    Route::get('create_user', UsersCreate::class)->name('create_user');
    Route::get('edit_user/{user_id}', UsersEdit::class)->name('edit_user');
    //About Us
    Route::get('about_us', AboutusIndex::class)->name('about_us');
    //About Us
    Route::get('contact_info', ContactinfoIndex::class)->name('contact_info');
    //contact message
    Route::get('contact_messages', ContactmessageIndex::class)->name('contact_messages');
    //Appointment page customize
    Route::get('appointment', BackendAppoitment::class)->name('appointment');
    //Core Value
    Route::get('core_value', CoreValueIndex::class)->name('core_value');
});

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/request_data', [HomeController::class, 'request_data'])->name('request_data');

// frontend
Route::get('/', Home::class)->name('home');
Route::get('/single_service/{slag}', SingleService::class)->name('single_service');
Route::get('/blog_list/{type}', BlogList::class)->name('blog_list');
Route::get('/blog_single/{type}/{slag}', BlogSingle::class)->name('blog_single');
Route::get('/team', Team::class)->name('team');
Route::get('/faq', Faq::class)->name('faq');
Route::get('/legal_fees', LegalFees::class)->name('legal_fees');
Route::get('/about_us', AboutUs::class)->name('about_us');
Route::get('/contact_us', ContactUs::class)->name('contact_us');
Route::get('/free-appointment', Appointment::class)->name('appointment');
Route::get('/paid-appointment', Appointment2::class)->name('appointment2');
Route::get('/search/{search}', Search::class)->name('search');
