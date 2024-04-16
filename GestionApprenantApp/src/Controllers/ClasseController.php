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

    public function NewPromotion($data, $iduser)
    {
        $data = file_get_contents('php://input');
        $array = json_decode($data, true);

        $array['Nom'] = htmlspecialchars(trim(strip_tags($array['Nom'])));
        $array['DateDebut'] = htmlspecialchars(trim(strip_tags($array['DateDebut'])));
        $array['DateFin'] = htmlspecialchars(trim(strip_tags($array['DateFin'])));
        $array['NombreApprenant'] = htmlspecialchars(trim(strip_tags($array['NombreApprenant'])));

        if (isset($array['Nom']) && !empty($array['Nom']) && isset($array['DateDebut']) && !empty($array['DateDebut']) && isset($array['DateFin']) && !empty($array['DateFin']) && isset($array['NombreApprenant']) && !empty($array['NombreApprenant'])) {
            $newClasse = [
                'Nom' => $array['Nom'],
                'DateDebut' => $array['DateDebut'],
                'DateFin' => $array['DateFin'],
                'NombreApprenant' => $array['NombreApprenant']
            ];

            $classe = new Classe($newClasse);
            if (isset($classe) && !empty($classe)) {
                $this->ClasseRepo->newClasse($classe, $iduser);
                $message = ['message' => "La promotion à bien été enregistré", 'classe' => $newClasse];
                echo json_encode($message);
            } else {
                $message = ['message' => "Problème lors de l'enregistrement"];
                echo json_encode($message);
            }
        } else {
            $message = ['message' => "Problème lors de l'enregistrement"];
            echo json_encode($message);
        }
    }
    public function deleteThisClasse($data, $iduser)
    {
        $data = file_get_contents('php://input');
        if ($this->ClasseRepo->deleteThisClasse($data, $iduser)) {
            $message = ['message' => "La promotion à bien été supprimer"];
            echo json_encode($message);
        } else {
            $message = ['message' => "Problème lors de la suppression de la classe"];
            echo json_encode($message);
        }
    }
}
