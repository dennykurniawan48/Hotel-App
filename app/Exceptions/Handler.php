<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Prophecy\Exception\Doubler\MethodNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            $this->renderable(function (NotFoundHttpException $e, $request) {
                return $this->errorResponse("Resource not found", Response::HTTP_NOT_FOUND);
            });
            $this->renderable(function (AuthenticationException $e, $request) {
                return $this->errorResponse("User not authenticated", Response::HTTP_UNAUTHORIZED);
            });
            $this->renderable(function (NotFoundHttpException $e, $request) {
                return $this->errorResponse("Resource not found", Response::HTTP_NOT_FOUND);
            });
    
            $this->renderable(function (AuthorizationException $e, $request) {
                return $this->errorResponse("User not authenticated", Response::HTTP_FORBIDDEN);
            });
    
            $this->renderable(function (MethodNotFoundException $e, $request){
                return $this->errorResponse("Invalid request", Response::HTTP_METHOD_NOT_ALLOWED);
            });
    
            $this->renderable(function (HttpException $e, $request){
                return $this->errorResponse($e->getMessage(), $e->getStatusCode());
            });
    
            // $this->renderable(function (QueryException $e, $request) {
            //     return $this->errorResponse("Server can't process request", Response::HTTP_CONFLICT);
            // });
    
            // return $this->errorResponse("Unexpected error, please try again later", Response::HTTP_INTERNAL_SERVER_ERROR);
        });
    }
}
