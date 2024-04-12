<?php

namespace src\Controllers;

class HomeController
{


    public function index(): void
    {
        if (isset($_GET['erreur'])) {
            $erreur = htmlspecialchars($_GET['erreur']);
        } else {
            $erreur = '';
        }
        include __DIR__ . "/../Views/accueil.php";
    }

    public function quit()
    {
        session_destroy();
        header('location: http://gestionapprenant/');
        exit;
    }

    public function page404(): void
    {
        header("HTTP/1.1 404 Not Found");
    }
}
