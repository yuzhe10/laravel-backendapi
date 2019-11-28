<?php
/**
 * Project: backend.
 * User: http://Yuzhe.Wang
 * Date: 2019/11/25
 * Time: 3:21 PM
 */

namespace App\Exceptions;



use Flugg\Responder\Exceptions\Http\HttpException;

class CreateException extends HttpException {
    /**
     * The HTTP status code.
     *
     * @var int
     */
    protected $status = 550;

    /**
     * The error code.
     *
     * @var string|null
     */
    protected $errorCode = 'creation_error';

    /**
     * The error message.
     *
     * @var string|null
     */
    protected $message = 'creation error.';
}
