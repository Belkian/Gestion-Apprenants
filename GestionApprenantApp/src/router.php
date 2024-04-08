<?php

use src\Controllers\HomeController;
use src\Services\Routing;

$HomeController = new HomeController;
$routeComposee = new Routing;

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];
$routeComposee = $routeComposee->routeComposee($route);

switch ($routeComposee[0]) {
  case $routeComposee[0]:
    $HomeController->index();
    break;
  case str_contains($route, "connexion"):
    if ($methode === 'POST') {
      $UserController->authentication($_POST['emailConnexion'], $_POST['motDePasseConnexion']);
    } else {
      $HomeController->connexion();
    }
    break;

  default:
    $HomeController->page404();
    break;
}
