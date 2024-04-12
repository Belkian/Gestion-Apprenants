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



if (isset($_SESSION['connecté']) == TRUE) {
  switch ($route) {
    case str_contains($routeComposee[0], "dashboard"):
      switch ($route) {
        case str_contains($routeComposee[1], "accueil"):
          $UserController->index($_SESSION['user']);
          break;

        case str_contains($routeComposee[1], "apprenant"):
          if ($methode == 'POST') {
            $UserController->registerUser($_POST);
          }
          break;

        case str_contains($routeComposee[1], "promotions"):

          break;
        case str_contains($routeComposee[1], "deconnexion"):
          $HomeController->quit();
          break;

        default:
          $UserController->index($_SESSION['user']);
          break;
      }
      break;

    default:
      $HomeController->page404();
      break;
  }
} else {
  switch ($route) {
    case HOME_URL:
      $HomeController->index();
      break;
    case str_contains($routeComposee[0], "connexion"):
      if ($methode === 'POST') {
        $UserController->authentication($_POST);
      }
      break;
    default:

      break;
  }
}
