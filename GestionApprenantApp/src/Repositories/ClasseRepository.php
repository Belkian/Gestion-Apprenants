<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Classe;
use PDO;

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
        $sql = "INSERT INTO " . PREFIXE . "classe (`NOM_CLASSE`, `NOMBRE_APPRENANT`, `DATE_DEBUT`, `DATE_FIN`) VALUES (:NOM_CLASSE, :NOMBRE_APPRENANT, :DATE_DEBUT, :DATE_FIN);
        SET @last_id = LAST_INSERT_ID();
        INSERT INTO " . PREFIXE . "userhasclasse (ID_CLASSE , ID_USER) VALUE (@last_id, :ID_USER);";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":NOM_CLASSE"       => $classe->getNomClasse(),
            ":NOMBRE_APPRENANT" => $classe->getNombreApprenant(),
            ":DATE_DEBUT"       => $classe->getDateDebut(),
            ":DATE_FIN"         => $classe->getDateFin(),
            ":ID_USER"          => $IdUser
        ]);

        $classe->setIdClasse($this->DB->lastInsertId());
        return $classe;
    }

    public function deleteThisClasse($IdClasse)
    {
        $sql = 'DELETE FROM ' . PREFIXE . 'userhasclasse 
        WHERE ' . PREFIXE . 'userhasclasse.ID_CLASSE = :ID_CLASSE;
        DELETE FROM ' . PREFIXE . 'classe  
        WHERE ' . PREFIXE . 'classe.ID_CLASSE = :ID_CLASSE;';

        $statement = $this->DB->prepare($sql);
        return $statement->execute([
            ':ID_CLASSE' => $IdClasse
        ]);
    }
}
