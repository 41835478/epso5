<?php

namespace App\Exceptions;

use App\Exceptions\WhoopsHandler;
use Exception, Session;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\{MethodNotAllowedHttpException, NotFoundHttpException};

class Handler extends WhoopsHandler
{
    /**
     * Show the native response from laravel to the current exception
     *
     * @var boolean
     */
    protected $showErrorException = true;

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
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //URL not MethodNotAllowedHttpException
        if($exception instanceof MethodNotAllowedHttpException) {
            return redirect()
                ->back()
                ->withErrors([trans('exception.notAlloweb'), trans('exception.contact'), $this->showErrorException($exception)]);
        }
        //URL not found
        if($exception instanceof NotFoundHttpException) {
            return redirect()
                ->back()
                ->withErrors([trans('exception.notFound'), trans('exception.contact'), $this->showErrorException($exception)]);
        }
        //Mysql exception
        if ($exception instanceof QueryException) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors([trans('exception.query'), trans('exception.contact'), $this->showErrorException($exception)]);
        }
        //Token exception
        if ($exception instanceof TokenMismatchException) {
            Session::regenerateToken();
            return redirect()
                ->back()
                ->withErrors([trans('exception.token'), trans('exception.contact'), $this->showErrorException($exception)]);
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        return redirect()->guest('login');
    }

    /**
     * Show the native response from laravel to the current exception
     *
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return array
     */
    protected function showErrorException($exception) {
        if(env('APP_ENV') === 'local') {
            return $this->showErrorException ? $exception->getMessage() : [];
        }
    }
}
