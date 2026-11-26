<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $e, Request $request) {
            $isCsrfMismatch = $e instanceof TokenMismatchException
                || ($e instanceof HttpExceptionInterface && $e->getStatusCode() === 419);

            if (! $isCsrfMismatch || $request->expectsJson()) {
                return null;
            }

            if ($request->is('admin/login') && $request->user()?->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            if ($request->is('admin*')) {
                return redirect()
                    ->route('admin.login')
                    ->withInput($request->except('password', '_token'))
                    ->with('status', 'Sesi halaman telah diperbarui. Silakan masuk kembali.');
            }

            return back()
                ->withInput($request->except('password', '_token'))
                ->with('status', 'Sesi halaman telah diperbarui. Silakan ulangi aksi Anda.');
        });
    }
}
