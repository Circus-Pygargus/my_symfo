<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


$routes = new RouteCollection;

// will set $name to 'world' if $_GET['name'] not found =)
// ! on utilise plus dans l'url /hello?name=riri mais /hello/riri !!!
$routes->add('hello', new Route('/hello/{name}', ['name' => 'world']));
$routes->add('bye', new Route('/bye'));

return $routes;