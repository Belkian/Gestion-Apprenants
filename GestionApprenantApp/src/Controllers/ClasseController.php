<?php

namespace src\Controllers;

use src\Models\Classe;
use src\Repositories\ClasseRepository;
use src\Services\Reponse;

class ClasseController
{
    private $ClasseRepo;
    use Reponse;

    public function __construct()
    {
        $this->ClasseRepo = new ClasseRepository;
    }

    public function NewPromotion($data)
    {
        $data = file_get_contents('php://input');
        $array = json_decode($data, true);

        $array['NomDeLaPromo'] = htmlspecialchars(trim(strip_tags($array['NomDeLaPromo'])));
        $array['DateDebut'] = htmlspecialchars(trim(strip_tags($array['DateDebut'])));
        $array['DateFin'] = htmlspecialchars(trim(strip_tags($array['DateFin'])));
        $array['PlacesDispo'] = htmlspecialchars(trim(strip_tags($array['PlacesDispo'])));

        if (isset($array['NomDeLaPromo']) && !empty($array['NomDeLaPromo']) && isset($array['DateDebut']) && !empty($array['DateDebut']) && isset($array['DateFin']) && !empty($array['DateFin']) && isset($array['PlacesDispo']) && !empty($array['PlacesDispo'])) {
            $newClasse = [
                'Nom' => $array['NomDeLaPromo'],
                'DateDebut' => $array['DateDebut'],
                'DateFin' => $array['DateFin'],
                'NombreApprenant' => $array['PlacesDispo']
            ];
            $classe = new Classe($newClasse);
            if (isset($classe) && !empty($classe)) {
                $this->ClasseRepo->newClasse($classe);
                $message = ['message' => "L'utilisateur a bien été enregistré"];
                return json_encode($message);
            } else {
                $message = ['message' => "Problème lors de l'enregistrement"];
                return json_encode($message);
            }
        } else {
            $message = ['message' => "Problème lors de l'enregistrement"];
            return json_encode($message);
        }
    }
}
