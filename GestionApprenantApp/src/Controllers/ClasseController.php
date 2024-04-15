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
                $_SESSION['classe'] = serialize($this->ClasseRepo->newClasse($classe, $iduser));
                $message = ['message' => "L'utilisateur a bien été enregistré", 'classe' => $_SESSION['classe']];
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
