<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Support\CmsHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for educational blog articles.
 */
class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::query()
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();

        return view('admin.articles.index', compact('articles'));
    }

    public function create(): View
    {
        return view('admin.articles.form', [
            'article' => new Article([
                'is_published' => true,
                'read_time' => '5 Menit Baca',
                'published_date_label' => now()->translatedFormat('d M Y'),
            ]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = CmsHelper::uniqueSlug(Article::class, $data['title']);

        if ($request->hasFile('thumbnail_file')) {
            $data['thumbnail'] = CmsHelper::storePublicImage($request->file('thumbnail_file'), 'articles');
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('status', 'Artikel blog berhasil ditambahkan.');
    }

    public function edit(Article $article): View
    {
        return view('admin.articles.form', compact('article'));
    }

    public function update(Request $request, Article $article): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = CmsHelper::uniqueSlug(Article::class, $data['title'], $article->id);

        if ($request->hasFile('thumbnail_file')) {
            $data['thumbnail'] = CmsHelper::storePublicImage($request->file('thumbnail_file'), 'articles');
        } elseif ($data['thumbnail'] === null) {
            $data['thumbnail'] = $article->thumbnail;
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('status', 'Artikel blog berhasil diperbarui.');
    }

    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('admin.articles.index')->with('status', 'Artikel blog berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'in:' . implode(',', array_keys(Article::CATEGORIES))],
            'category_label' => ['nullable', 'string', 'max:80'],
            'excerpt' => ['required', 'string'],
            'content' => ['required', 'string'],
            'author_name' => ['required', 'string', 'max:120'],
            'author_role' => ['nullable', 'string', 'max:120'],
            'read_time' => ['required', 'string', 'max:60'],
            'published_date_label' => ['required', 'string', 'max:60'],
            'thumbnail' => ['nullable', 'string', 'max:255'],
            'video_url' => ['nullable', 'string', 'max:255'],
            'thumbnail_file' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'title' => $validated['title'],
            'category' => $validated['category'],
            'category_label' => ! empty($validated['category_label']) ? $validated['category_label'] : Article::CATEGORIES[$validated['category']],
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'author_name' => $validated['author_name'],
            'author_role' => $validated['author_role'] ?? null,
            'read_time' => $validated['read_time'],
            'published_date_label' => $validated['published_date_label'],
            'thumbnail' => $validated['thumbnail'] ?? null,
            'video_url' => $validated['video_url'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_published' => $request->boolean('is_published'),
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
        ];
    }
}
