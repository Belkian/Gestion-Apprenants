<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\Cours;
use PDO;
use PDOException;

class CoursRepository
{
    private $DB;
    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }

    public function saveCours(Cours $Cours)
    {
        $sql = "INSERT INTO " . PREFIXE . "cours (DATETIME_DEBUT, DATETIME_FIN, CODE, ID_CLASS) VALUES (:DATETIME_DEBUT, :DATETIME_FIN, :CODE, :ID_CLASS)";
        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ':DATETIME_DEBUT' => $Cours->getDatetimeDebut(),
            ':DATETIME_FIN' => $Cours->getDatetimeFin(),
            ':CODE' => $Cours->getCode(),
            ':ID_CLASS' => $Cours->getIdClass()
        ]);

        return $statement;
    }

    public function createCourCode()
    {
        $sql = "INSERT INTO " . PREFIXE . "cours (CODE) VALUE (FLOOR(RAND()*100000));";
        $statement = $this->DB->prepare($sql);
        $statement->execute();
    }

    public function verifyCodeCours()
    {
        $sql = "SELECT  " . PREFIXE . "cours.CODE FROM " . PREFIXE . "userhascours," . PREFIXE . "cours WHERE " . PREFIXE . "userhascour.ID_USER = :ID_USER";
        $statement = $this->DB->prepare($sql);
        return $statement->execute();
    }
}
