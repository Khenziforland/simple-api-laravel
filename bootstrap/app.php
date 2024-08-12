<?php

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append([
            \App\Http\Middleware\TrimStrings::class,
            \App\Http\Middleware\TrustProxies::class,
            \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
            \Illuminate\Http\Middleware\HandleCors::class,
            \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
            \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        ]);

        $middleware->web(append: [
            \App\Http\Middleware\EncryptCookies::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);

        $middleware->api(prepend: [
            // \Illuminate\Routing\Middleware\ThrottleRequests::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);

        $middleware->alias([
            'auth' => \App\Http\Middleware\Authenticate::class,
            'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
            'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
            'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
            'can' => \Illuminate\Auth\Middleware\Authorize::class,
            'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
            'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'precognitive' => \Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'signed' => \App\Http\Middleware\ValidateSignature::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->renderable(function (Throwable $e, $request) {
            if ($request->is('api/*')) {
                if ($e instanceof AuthenticationException) {
                    $response = [
                        'status' => false,
                        'message' => 'Belum authentikasi !',
                    ];

                    return response($response, 401);
                }

                if ($e instanceof NotFoundHttpException) {
                    $response = [
                        'status' => false,
                        'message' => 'URL tidak ditemukan !',
                    ];

                    return response($response, 404);
                }

                if ($e instanceof MethodNotAllowedHttpException) {
                    $response = [
                        'status' => false,
                        'message' => 'Method tidak diizinkan !',
                    ];

                    return response($response, 405);
                }

                if ($e instanceof ValidationException) {
                    $error = $e->errors();
                    $field = array_key_first($error);
                    $message = collect($e->errors())->first()[0];

                    $response = [
                        'status' => false,
                        'message' => $message,
                        'error_field' => $field,
                    ];

                    return response()->json($response, 400);
                }

                if ($e instanceof ThrottleRequestsException) {
                    $message = $e->getMessage();

                    $response = [
                        'status' => false,
                        'message' => $message,
                    ];

                    return response()->json($response, 429);
                }

                if ($e instanceof HttpExceptionInterface) {
                    $response = [
                        'status' => false,
                        'message' => $e->getMessage(),
                    ];

                    if (config('app.debug')) {
                        $debug = [
                            'exception' => get_class($e),
                            'file' => $e->getFile(),
                            'trace' => $e->getTrace(),
                        ];

                        $response = array_merge($response, $debug);
                    }

                    if ($e->getStatusCode() === 429) {
                        $retry = $e->getHeaders()['Retry-After'];
                        $response['message'] = 'Try again in ' . $retry . ' seconds';
                    }

                    return response()->json($response, $e->getStatusCode());
                }
            }
        });
    })->create();
