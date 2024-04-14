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
        $sql = "INSERT INTO " . PREFIXE . "user (NOM, PRENOM, PASSWORD, ID_ROLE, EMAIL) VALUES (:NOM, :PRENOM, :PASSWORD, :ID_ROLE, :EMAIL)";

        $statement = $this->DB->prepare($sql);
        $statement->execute([
            ':NOM' => $user->getNom(),
            ':PRENOM' => $user->getPrenom(),
            ':PASSWORD' => $user->getPassword(),
            ':ID_ROLE' => $user->getIdRole(),
            ':EMAIL' => $user->getEmail()
        ]);

        // $to      = $user->getEmail();
        // $subject = 'Inscription au site SimplonSuivis';
        // $message = 'Bonjour ' . $user->getPrenom() . ' ! Veuillez cliquer sur le lien ci-dessous 
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

        return $statement;
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

    public function getThisUser($email): User|bool
    {
        $sql = "SELECT * FROM " . PREFIXE . "user WHERE EMAIL = :EMAIL ";

        $statement = $this->DB->prepare($sql);
        $statement->bindParam(':EMAIL', $email);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $retour = $statement->fetch();

        return $retour;
    }

    // public function getThisUser($email): User|bool
    // {
    //     $sql = "SELECT * FROM " . PREFIXE . "user, 
    //     " . PREFIXE . "role, 
    //     " . PREFIXE . "classe , 
    //     " . PREFIXE . "userhasclasse,
    //     " . PREFIXE . "userhascours  
    //     WHERE " . PREFIXE . "user.EMAIL = :EMAIL 
    //     AND gestionapp_user.";

    //     $statement = $this->DB->prepare($sql);
    //     $statement->bindParam(':EMAIL', $email);
    //     $statement->execute();
    //     $statement->setFetchMode(PDO::FETCH_CLASS, AllInformationUser::class);
    //     $retour = $statement->fetch();

    //     return $retour;
    //}
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
