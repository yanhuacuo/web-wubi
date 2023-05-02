<?php

declare(strict_types=1);

namespace Jingjingxyk\WebWubiServer\Controller;


use  Swoole\Http\Response;
use  Swoole\Http\Request;


class ApiController
{
    # 使用注解 ，反射注入 完成依赖注入，会省事很多 todo
    public function queryAction(Request $request, Response $response)
    {
        var_dump($request->getContent());
        $response->end($request->getContent());
    }

    public function __call($name,$arguments)
    {
        var_dump($arguments[0]->get);
        var_dump($arguments[0]->getContent());
        var_dump($arguments[0]->cookie);
        var_dump($arguments[0]->header);
        echo "Calling object method '$name' ";
        echo PHP_EOL;
        echo json_encode($arguments);
        echo PHP_EOL;
        $arguments[1]->end(json_encode(['code'=>404,'msg'=>'no found error','data'=>[]]));
    }
}