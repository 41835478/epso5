<?php
/**
 * Part of the Laravel Whoops package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Laravel Whoops
 * @version    2.0.0
 * @author     Werxe LTD
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2016, Werxe LTD
 * @link       http://werxe.com
 */

namespace App\Exceptions;

use Exception;
use Whoops\Run as Whoops;
use Whoops\Handler\PrettyPageHandler as PrettyPage;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class WhoopsHandler extends \Illuminate\Foundation\Exceptions\Handler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Create a Symfony response for the given exception.
     *
     * @param  \Exception  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertExceptionToResponse(Exception $e)
    {
        if (config('app.debug')) {
            $whoops = new Whoops;
            $whoops->pushHandler(new PrettyPage);
            $whoops->register();
            return SymfonyResponse::create(
                $whoops->handleException($e), $e->getStatusCode(), $e->getHeaders()
            );
        }
        return parent::convertExceptionToResponse($e);
    }
}
