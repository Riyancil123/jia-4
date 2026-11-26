<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * Lists, exports, and manages newsletter subscribers captured from the public blog.
 */
class NewsletterSubscriberController extends Controller
{
    public function index(): View
    {
        $subscribers = NewsletterSubscriber::query()->latest('subscribed_at')->paginate(25);

        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function exportCsv(): StreamedResponse
    {
        $filename = 'jia-learning-subscribers-' . now()->format('Y-m-d') . '.csv';

        return response()->streamDownload(function (): void {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Email', 'Tanggal Daftar']);

            NewsletterSubscriber::query()
                ->orderByDesc('subscribed_at')
                ->chunk(200, function ($rows) use ($handle): void {
                    foreach ($rows as $row) {
                        fputcsv($handle, [
                            $row->id,
                            $row->email,
                            optional($row->subscribed_at)->format('Y-m-d H:i:s'),
                        ]);
                    }
                });

            fclose($handle);
        }, $filename, ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    public function destroy(NewsletterSubscriber $subscriber): RedirectResponse
    {
        $subscriber->delete();

        return redirect()->route('admin.subscribers.index')->with('status', 'Subscriber berhasil dihapus.');
    }
}
