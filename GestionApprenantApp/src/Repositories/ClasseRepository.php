<?php

namespace src\Repositories;

use PDO;
use src\Models\Database;
use src\Models\Classe;

class ClasseRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }

    public function newClasse(Classe $classe, $IdUser)
    {
        $sql = "INSERT INTO " . PREFIXE . "classe (`NOM`, `NOMBRE_APPRENANT`, `DATE_DEBUT`, `DATE_FIN`) VALUES (:NOM, :NOMBRE_APPRENANT, :DATE_DEBUT, :DATE_FIN);
        INSERT INTO " . PREFIXE . "userhasclasse (ID_CLASS , ID_USER) VALUE (LAST_INSERT_ID(), :ID_USER);";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":NOM"              => $classe->getNom(),
            ":NOMBRE_APPRENANT" => $classe->getNombreApprenant(),
            ":DATE_DEBUT"       => $classe->getDateDebut(),
            ":DATE_FIN"         => $classe->getDateFin(),
            ":ID_USER"          => $IdUser
        ]);

        return $statement;
    }
}
