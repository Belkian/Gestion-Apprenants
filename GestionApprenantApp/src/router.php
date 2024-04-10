<?php

use src\Controllers\HomeController;
use src\Controllers\UserController;
use src\Services\Routing;

$UserController = new UserController;
$HomeController = new HomeController;
$routeComposee = new Routing;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = $routeComposee->routeComposee($route);

switch ($route) {
  case HOME_URL:
    $HomeController->index();
    break;

  case str_contains($routeComposee[0], "connexion"):
    if ($methode === 'POST') {
      $UserController->authentication($_POST);
    } else {
      $HomeController->index();
    }
    break;

  case str_contains($routeComposee[0], "deconnexion"):
    $HomeController->quit();
    break;

    switch (str_contains($routeComposee[0], "dashboard")) {
      case 'promotion':
        $UserController->index();
        break;

      default:
        $UserController->index();
        break;
    }
  default:
    $HomeController->page404();
    break;
}
