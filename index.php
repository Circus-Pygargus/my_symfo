<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require __dir__ . '/vendor/autoload.php';

$request = Request::createFromGlobals();

$name = $request->query->get('name', 'world');

$response = new Response();
$response->headers->set('Content-type', 'text/html; charset=utf8');
$response->setContent(sprintf('Hello %s', htmlspecialchars($name, ENT_QUOTES)));
$response->send();

// header('Content-Type: text/html; charset=utf8');

// printf('Hello %s', htmlspecialchars($name, ENT_QUOTES));
