<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\LearningMaterial;
use App\Models\LiveClass;
use App\Models\Mentor;
use App\Models\NewsletterSubscriber;
use App\Models\PlatformUpdate;
use App\Models\Program;
use App\Models\QuestionModule;
use App\Models\Testimonial;
use App\Models\Voucher;
use Illuminate\View\View;

/**
 * Displays CMS summary metrics and recent activity on the admin dashboard.
 */
class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'programs' => Program::count(),
            'articles' => Article::count(),
            'mentors' => Mentor::count(),
            'materials' => LearningMaterial::count(),
            'questionModules' => QuestionModule::count(),
            'liveClasses' => LiveClass::count(),
            'faqs' => Faq::count(),
            'testimonials' => Testimonial::count(),
            'features' => Feature::count(),
            'updates' => PlatformUpdate::count(),
            'vouchers' => Voucher::where('is_active', true)->count(),
            'subscribers' => NewsletterSubscriber::count(),
        ];

        $recentArticles = Article::query()->latest()->limit(5)->get();
        $recentSubscribers = NewsletterSubscriber::query()->latest('subscribed_at')->limit(6)->get();

        return view('admin.dashboard', compact('stats', 'recentArticles', 'recentSubscribers'));
    }
}
