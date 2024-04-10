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
    }

    public function page404(): void
    {
        include __DIR__ . "/../Views/accueil.php";
    }
}
