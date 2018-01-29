<?php

namespace App\Services;

use Symfony\Cmf\Component\Routing\RouteProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;

class RouterApi implements RouteProviderInterface
{
    private $collection;

    public function getRouteCollectionForRequest(Request $request)
    {
        //var_dump($request);
        $collection = new RouteCollection();

        $collection->add('test', new Route(
           'salutbg', ['_controller' => 'App\Controller\TestController:bg']

        ));

        $this->collection = $collection;

        return $collection;
    }

    public function getRouteByName($name)
    {
        if ($name === 'test') {
            return  new Route(
                'salutbg', ['_controller' => 'App\Controller\TestController:bg']

            );
        }
    }

    public function getRoutesByNames($names)
    {
        $routes = [];

        foreach ($names as $name) {
            $routes[] = $this->getRouteByName($name);
        }

        return $routes;
    }
}
