<?php

namespace src\Repositories;

use COM;
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
        INSERT INTO " . PREFIXE . "userhasclasse (ID_CLASS , ID_USER) VALUE (LAST_INSERT_ID(), :ID_USER);
        SELECT * FROM " . PREFIXE . "classe WHERE " . PREFIXE . "classe.ID_CLASSE = LAST_INSERT_ID()";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ":NOM"              => $classe->getNom(),
            ":NOMBRE_APPRENANT" => $classe->getNombreApprenant(),
            ":DATE_DEBUT"       => $classe->getDateDebut(),
            ":DATE_FIN"         => $classe->getDateFin(),
            ":ID_USER"          => $IdUser
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, Classe::class);
        return $statement->fetch();
    }

    // public function getAllClasses($IdUser)
    // {
    //     $sql = "SELECT " . PREFIXE . "classe.* FROM " . PREFIXE . "classe, " . PREFIXE . "userhasclasse, " . PREFIXE . "user 
    //     WHERE " . PREFIXE . "classe.ID_CLASSE = " . PREFIXE . "userhasclasse.ID_CLASSE 
    //     AND " . PREFIXE . "user.ID_USER = " . PREFIXE . "userhasclasse.ID_USER 
    //     AND " . PREFIXE . "user.ID_USER = :ID_USER;";

    //     $statement = $this->DB->prepare($sql);
    //     $statement->execute([
    //         ":ID_USER" => $IdUser
    //     ]);
    //     return $statement->fetchALL(PDO::FETCH_CLASS, Classe::class);
    // }

    public function deleteThisClasse($IdClasse, $IdUser)
    {
        $sql = 'DELETE FROM ' . PREFIXE . 'userhasclasse WHERE ' . PREFIXE . 'userhasclasse.ID_CLASSE = :ID_USER;
        DELETE FROM ' . PREFIXE . 'classe  WHERE ' . PREFIXE . 'classe.ID_CLASSE = :ID_CLASSE;';
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            'ID_USER' => $IdUser,
            'ID_CLASSE' => $IdClasse
        ]);
        return TRUE;
    }
}
