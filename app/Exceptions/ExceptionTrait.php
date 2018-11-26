<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($e) {
        if ($this->isModelException($e)) {
            return $this->modelResponse();
        }

        if ($this->isHttpException($e)) {
            return $this->httpResponse();
        }
    }

    protected function isModelException($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function isHttpException($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function modelResponse()
    {
        return response()->json([
            'errors' => 'Model Product not found'
        ], Response::HTTP_NOT_FOUND);
    }

    protected function httpResponse()
    {
        return response()->json([
            'errors' => 'Not found'
        ], Response::HTTP_NOT_FOUND);
    }
}
