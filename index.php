<?php
require_once __DIR__.'/vendor/autoload.php';
use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

//初始化
confInit();

$dispatch = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route){
    $route->addRoute('GET','/test',function (){
        return 'hello world!';
    });
});

$http = new Server(getenv('APP_URL'),getenv('APP_PORT'));

$http->on('request',function (Request $request,Response $response) use ($dispatch){
    $swRequest = App\Services\RequestService::init($request);
    $Route = $dispatch->dispatch($swRequest->getMethod(),$swRequest->getUri());
    switch ($Route[0]) {
        case FastRoute\Dispatcher::NOT_FOUND;
           $response->status(404);
           $response->end();
           break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED;
           $response->status(405);
           $response->end();
           break;
        case FastRoute\Dispatcher::FOUND;
           $response->status(200);
           $response->end($Route[1]());
           break;
    }
});

$http->start();
