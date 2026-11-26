<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Models\Voucher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Handles lightweight interactive endpoints such as newsletter subscriptions and voucher checks.
 */
class InteractionController extends Controller
{
    /**
     * Validate and persist an educational newsletter subscription request.
     */
    public function subscribeNewsletter(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $email = strtolower(trim($validated['email']));

        NewsletterSubscriber::updateOrCreate(
            ['email' => $email],
            ['subscribed_at' => now()]
        );

        return response()->json([
            'status' => 'success',
            'email' => $email,
            'message' => 'Terima kasih! Email Anda telah terdaftar untuk menerima newsletter edukasi Jia Learning.',
        ]);
    }

    /**
     * Validate a promotional voucher code against CMS-managed vouchers.
     */
    public function validateVoucher(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:64'],
        ]);

        $code = strtoupper(trim($validated['code']));
        $voucher = Voucher::query()
            ->where('code', $code)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('expires_at')
                    ->orWhereDate('expires_at', '>=', now()->toDateString());
            })
            ->first();

        if (! $voucher) {
            return response()->json([
                'valid' => false,
                'message' => "Kode voucher '{$code}' tidak ditemukan atau sudah kedaluwarsa.",
            ], 404);
        }

        return response()->json([
            'valid' => true,
            'code' => $voucher->code,
            'discount_label' => $voucher->discount_label,
            'message' => "Voucher '{$voucher->code}' ({$voucher->discount_label}) berhasil divalidasi! {$voucher->description}",
        ]);
    }
}
