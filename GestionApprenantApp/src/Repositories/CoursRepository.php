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
}
