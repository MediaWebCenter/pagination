<?php
namespace Src\Controllers\Api;

use Src\Controllers\Controller;
use Psr\Http\Message\{
  ServerRequestInterface as Request,
  ResponseInterface as Response
};

class NewsController extends Controller
{

    public function show(Request $request, Response $response, $arg){

        return $response->withJson(
            
            $this->c->services->get($arg['service'])

        );

    

    }
}