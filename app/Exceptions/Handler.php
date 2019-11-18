<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // This will replace our 404 response with
        // a JSON response.

        if (($exception instanceof ModelNotFoundException && $request->wantsJson) || $request->is('api/*')) {
//            return response()->json(['message' => 'Not Found!'], 404);
            $error = (!empty($exception->getMessage())) ? $exception->getMessage() : "Not enough parameters or another reason. Read please documentation.";
            return response()->json([
                'result' => 2,
                'error' => $error]);
        }

        // базовый вариант
        if ($exception instanceof ModelNotFoundException &&
            $request->wantsJson()) {
            return response()->json([
                'data' => 'Resource not found'
            ], 404);
        }
        return parent::render($request, $exception);

    }

    /*
     * new render
     * */
//    public function render($request, Exception $e)
//    {
//        $parentRender = parent::render($request, $e);
//
//        // if parent returns a JsonResponse
//        // for example in case of a ValidationException
//        if ($parentRender instanceof JsonResponse)
//        {
//            return $parentRender;
//        }
//
//        return new JsonResponse([
//            'message' => $e instanceof HttpException
//                ? $e->getMessage()
//                : 'Server Error',
//        ], $parentRender->status());
//    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Auth\AuthenticationException $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
//        return response()->json(['error' => 'Unauthenticated.'], 401);
        return $request->expectsJson()
            ? response()->json(['message' => 'Unauthenticated.'], 401)
            : redirect()->guest(route('/'));
    }
}
