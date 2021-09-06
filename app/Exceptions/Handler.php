<?php

namespace App\Exceptions;

use Laka\Core\Http\Response\WebResponse;
use App\Facades\Common;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Prettus\Validator\Exceptions\ValidatorException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $e
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidatorException) {
            return WebResponse::exception(route(Common::getSectionCode().'.index'), null, $e->getMessageBag()->toArray());
        }
        return parent::render($request, $e);
    }
}
