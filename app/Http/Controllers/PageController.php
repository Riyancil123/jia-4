<?php

namespace App\Http\Controllers;

use App\Services\JiaContentService;
use Illuminate\View\View;

/**
 * Handles rendering of the Jia Learning landing and feature views.
 */
class PageController extends Controller
{
    public function __construct(private readonly JiaContentService $contentService)
    {
    }

    /**
     * Display the default Beranda view.
     */
    public function index(): View
    {
        return $this->renderPage('beranda');
    }

    /**
     * Display a specific view section directly via its route slug.
     */
    public function show(string $page): View
    {
        if (! in_array($page, JiaContentService::VALID_VIEWS, true)) {
            abort(404);
        }

        return $this->renderPage($page);
    }

    /**
     * Build the shared view payload with the requested active section.
     */
    private function renderPage(string $activeView): View
    {
        return view('home', array_merge(
            $this->contentService->getPageData(),
            ['activeView' => $activeView]
        ));
    }
}
