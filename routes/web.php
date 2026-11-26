<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\LearningMaterialController;
use App\Http\Controllers\Admin\LiveClassController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use App\Http\Controllers\Admin\PlatformUpdateController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\QuestionModuleController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\PageController;
use App\Services\JiaContentService;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'index'])->name('home');

Route::get('/blog', fn (PageController $controller) => $controller->show('pahami-materi'))
    ->name('blog');

Route::post('/newsletter', [InteractionController::class, 'subscribeNewsletter'])
    ->name('newsletter.subscribe');

Route::post('/voucher/validate', [InteractionController::class, 'validateVoucher'])
    ->name('voucher.validate');

/*
|--------------------------------------------------------------------------
| CMS Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::middleware('guest')->group(function (): void {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware(['auth', 'admin'])->group(function (): void {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
        Route::put('/settings', [SiteSettingController::class, 'update'])->name('settings.update');

        Route::resource('programs', ProgramController::class)->except(['show']);
        Route::resource('articles', ArticleController::class)->except(['show']);
        Route::resource('updates', PlatformUpdateController::class)->except(['show']);
        Route::resource('mentors', MentorController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('materials', LearningMaterialController::class)->except(['show']);
        Route::resource('question-modules', QuestionModuleController::class)->except(['show']);
        Route::resource('live-classes', LiveClassController::class)->except(['show']);
        Route::resource('faqs', FaqController::class)->except(['show']);
        Route::resource('features', FeatureController::class)->except(['show']);
        Route::resource('vouchers', VoucherController::class)->except(['show']);

        Route::get('/subscribers', [NewsletterSubscriberController::class, 'index'])->name('subscribers.index');
        Route::get('/subscribers/export', [NewsletterSubscriberController::class, 'exportCsv'])->name('subscribers.export');
        Route::delete('/subscribers/{subscriber}', [NewsletterSubscriberController::class, 'destroy'])->name('subscribers.destroy');
    });
});

Route::get('/{page}', [PageController::class, 'show'])
    ->where('page', implode('|', JiaContentService::VALID_VIEWS))
    ->name('page.show');
