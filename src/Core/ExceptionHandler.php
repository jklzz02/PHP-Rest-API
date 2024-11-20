<?php

namespace Jklzz02\RestApi\Core;

use Jklzz02\RestApi\Exception\GatewayException\UnknownColumnException;
use Jklzz02\RestApi\Exception\HTTPException\HTTPBadRequestException;
use Jklzz02\RestApi\Exception\HTTPException\HTTPNotFoundException;
use Jklzz02\RestApi\Exception\HTTPException\HTTPUnauthorizedException;

class ExceptionHandler{

    public function __construct(protected Responder $responder)
    {
    }

    public function handle(\Throwable $e): never
    {

        switch (get_class($e)) {

            case HTTPBadRequestException::class:
                $this->responder->badRequest($e->getMessage());
                break;

            case HTTPUnauthorizedException::class:
                $this->responder->unauthorized();
                break;

            case HTTPNotFoundException::class:
                $this->responder->notFound($e->getMessage());
                break;

            case UnknownColumnException::class:
                $this->responder->badRequest();
                break;

            default:
            
                error_log($e);
                $this->responder->internalError();
                break;
        }
    }

}