<?php

namespace src\Repositories;

use src\Models\Database;
use src\Models\User;
use PDO;
use PDOException;

class UserRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    public function saveApprenant(User $user)
    {
        $sql = "INSERT INTO " . PREFIXE . "user (NOM, PRENOM, PASSWORD, ID_ROLE, EMAIL) VALUES (:NOM, :PRENOM, :PASSWORD, :ID_ROLE, :EMAIL);
        SELECT LAST_INSERT_ID();";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ':NOM' => $user->getNom(),
            ':PRENOM' => $user->getPrenom(),
            ':PASSWORD' => $user->getPassword(),
            ':ID_ROLE' => $user->getIdRole(),
            ':EMAIL' => $user->getEmail()
        ]);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);

        // $to      = $user->getEmail();
        // $subject = 'Inscription au site SimplonSuivis';
        // $message = 'Bonjour ' . $user->getPrenom() . ' ! Veuillez cliquer sur le lien ci-dessous pour comfirmer vote inscription.
        // le LIEN !!!';
        // $headers = 'From: email@envoi.fr' . "\r\n" .
        //     'Reply-To: email@envoi.fr' . "\r\n" .
        //     'X-Mailer: PHP/' . phpversion();

        // mail($to, $subject, $message, $headers);

        // if ($test) {
        //     echo "le mail a bien été envoyé.";
        // } else {
        //     var_dump($test); // reverra la valeur de la fonction mail, probablement false. Aller voir dans ce cas le fichier error.log dans C://wamp/sendmail/
        // }

        return $statement->fetch();
    }

    public function userExist(User $user)
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE EMAIL = :EMAIL";
        $email = $user->getEmail();
        $statement = $this->DB->prepare($sql);
        $statement->execute([':EMAIL' => $email]);

        if ($statement->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getThisUser($email)
    {
        $sql = "SELECT " . PREFIXE . "user.*,
        " . PREFIXE . "classe.*,
        " . PREFIXE . "classe.NOM_CLASSE,
        " . PREFIXE . "role.NAME as ROLE_NAME
        FROM " . PREFIXE . "user
        LEFT JOIN " . PREFIXE . "userhasclasse ON " . PREFIXE . "user.ID_USER = " . PREFIXE . "userhasclasse.ID_USER
        LEFT JOIN " . PREFIXE . "classe ON " . PREFIXE . "userhasclasse.ID_CLASSE = " . PREFIXE . "classe.ID_CLASSE
        INNER JOIN " . PREFIXE . "role ON " . PREFIXE . "user.ID_ROLE = " . PREFIXE . "role.ID_ROLE
        WHERE gestionapp_user.EMAIL = :EMAIL;";

        $statement = $this->DB->prepare($sql);
        $statement->execute([':EMAIL' => $email]);
        $retour = $statement->fetchAll(PDO::FETCH_CLASS, User::class);
        return $retour;
    }

    public function getAllApprenant($role)
    {
        if ($role == 4 | $role == 'Admin' | $role == 3) {
            $sql = "SELECT " . PREFIXE . "user.ID_USER, 
		" . PREFIXE . "user.ID_ROLE,
        " . PREFIXE . "user.NOM,
        " . PREFIXE . "user.PRENOM,
        " . PREFIXE . "user.EMAIL
       FROM " . PREFIXE . "user
       WHERE " . PREFIXE . "user.ID_ROLE = '3';";

            $statement = $this->DB->prepare($sql);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_CLASS, User::class);
        }
    }

    public function getThisUserById($id): User|bool
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE Id = :Id";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':Id', $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();

        return $retour;
    }

    public function updateThisUser(User $user): bool
    {
        $sql = "UPDATE " . PREFIXE .
            "user 
        SET
            NOM = :NOM,
            PRENOM = :PRENOM, 
            PASSWORD = :PASSWORD,
            ID_ROLE = :ID_ROLE,
            EMAIL = :EMAIL
            WHERE ID_USER = :ID_USER;";

        $statement = $this->DB->prepare($sql);

        $retour = $statement->execute([
            ':NOM' => $user->getNom(),
            ':PRENOM' => $user->getPrenom(),
            ':PASSWORD' => $user->getPassword(),
            ':ID_ROLE' => $user->getIdRole(),
            ':EMAIL' => $user->getEmail(),
            ':ID_USER' => $user->getIdUser()
        ]);

        return $retour;
    }


    public function deleteThisUser(int $ID): bool
    {
        try {
            $sql = "DELETE FROM " . PREFIXE . "user WHERE Id_User = :Id_User;";

            $statement = $this->DB->prepare($sql);

            return $statement->execute([':ID' => $ID]);
        } catch (PDOException $error) {
            echo "Erreur de suppression : " . $error->getMessage();
            return FALSE;
        }
    }
}
