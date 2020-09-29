<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;





$routes = new RouteCollection;

// will set $name to 'world' if $_GET['name'] not found =)
// ! on utilise plus dans l'url /hello?name=riri mais /hello/riri !!!
// ici le premier 'hello' correspond au nom du fichier ;)  (voir pour 'about' plus bas)
$routes->add('hello', new Route('/hello/{name}', [
    'name' => 'world',
    // ici notre callable function (on l'appelle _controller par convention)
    // ici quand on appellera _controller, il ira chercher la méthode hello de l'objet instancié depuis la classe GreetingController
    '_controller' => 'App\Controller\GreetingController::hello'
]));
$routes->add('bye', new Route('/bye', [
    '_controller' => 'App\Controller\GreetingController::bye'
]));
$routes->add('cms/about', new Route('/a-propos', [
    // '_controller' => [new App\Controller\PageController, 'about']    
    '_controller' => 'App\Controller\PageController::about'
]));

return $routes;