<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

require __DIR__ . '/../vendor/autoload.php';


$request = Request::createFromGlobals();

$response = new Response();

require __DIR__ . '/../src/routes.php';

$context = new RequestContext();
$context->fromRequest($request);

$urlMatcher = new UrlMatcher($routes, $context);

$pathInfo = $request->getPathInfo();

try {
    $urlMatcher->match($pathInfo);
    // va créer des variable selon le contenu du tableau
    // va créer $_route
    // va créer $name si présent dans l'url
    extract($resultat);
    // var_dump($name);
    ob_start();
    include __DIR__ . '/../src/pages/' . $_route . '.php';
    $response->setContent(ob_get_clean());
}
catch (ResourceNotFoundException $e) {
    // $response->setContent("La page demandée n'existe pas.");
    // $response->setStatusCode(404);
    // remplace les 2 lignes du haut :
    $response = new Response("La page demandée n'existe pas.", 404);
}
catch (Exception $e) {
    $response->setContent('Une erreur est arrivée sur le serveur.');
    $response->setStatusCode(500);
}

$response->send();