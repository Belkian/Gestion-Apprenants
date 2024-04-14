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

    public function newClasse(Classe $classe)
    {
        $sql = "INSERT INTO " . PREFIXE . "classe ( `NOM`, `NOMBRE_APPRENANT`, `DATE_DEBUT`, `DATE_FIN`) VALUES (:NOM, :NOMBRE_APPRENANT, :DATE_DEBUT, :DATE_FIN);
        SELECT LAST_INSERT_ID();";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":NOM" => $classe->getNom(),
            ":NOMBRE_APPRENANT" => $classe->getNombreApprenant(),
            ":DATE_DEBUT" => $classe->getDateDebut(),
            ":DATE_FIN" => $classe->getDateFin()
        ]);

        return $statement;
    }
}
