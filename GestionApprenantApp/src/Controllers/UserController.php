<?php

namespace src\Controllers;

use src\Models\User;
use src\Repositories\UserRepository;
use src\Services\Reponse;

class UserController
{
    private $UserRepo;
    use Reponse;

    public function __construct()
    {
        $this->UserRepo = new UserRepository();
    }

    public function index($data)
    {
        $data = unserialize($data);
        $this->authentication($data);
    }

    public function registerApprenant($data)
    {
        $data = file_get_contents('php://input');
        $array = json_decode($data, true);

        $array['NomApprenant'] = htmlspecialchars(trim(strip_tags($array['NomApprenant'])));
        $array['PrenomApprenant'] = htmlspecialchars(trim(strip_tags($array['PrenomApprenant'])));
        $array['EmailApprenant'] = htmlspecialchars(trim(strip_tags($array['EmailApprenant'])));

        if (isset($array['EmailApprenant']) && !empty($array['EmailApprenant']) && isset($array['PrenomApprenant']) && !empty($array['PrenomApprenant']) && isset($array['NomApprenant']) && !empty($array['NomApprenant'])) {
            $newApprenant = [
                'Nom' => $array['NomApprenant'],
                'Prenom' => $array['PrenomApprenant'],
                'Email' => $array['EmailApprenant'],
                'IdRole' => 3,
                'Password' => 'password'
            ];
            $user = new User($newApprenant);
            if (isset($user) && !empty($user)) {
                $apprenant = $this->UserRepo->saveApprenant($user);
                $message = ['message' => "L'utilisateur a bien été enregistré", 'apprenant' => $apprenant];
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

    public function authentication($data)
    {
        $data = file_get_contents('php://input');
        $array = json_decode($data, true);

        if (!empty($array) && isset($array)) {
            if ($User = $this->UserRepo->getThisUser($array['Email'])) {
                if (password_verify($array['Password'], $User[0]->getPassword())) {
                    $_SESSION['connecté'] = TRUE;
                    if ($User[0]->getRoleName() == 'Admin') {
                        $_SESSION['user'] = serialize($User[0]->getIdUser());
                        $_SESSION['apprenant'] = $this->UserRepo->getAllApprenant($User[0]->getRoleName());
                        $_SESSION['classe'] = $User;
                        $this->render('dashboard', ['user' => $_SESSION['user'], 'classe' => $_SESSION['classe'], 'apprenant' => $_SESSION['apprenant']]);
                    }
                    if ($User[0]->getRoleName() == 'Apprenant') {
                        $_SESSION['user'] = serialize($User);
                        $this->render('dashboard', ['user' => $_SESSION['user']]);
                    }
                } else {
                    echo http_response_code(401);
                }
            } else {
                echo http_response_code(401);
            }
        }
    }


    public function deleteThisUser($id)
    {
        $User = $this->UserRepo->deleteThisUser($id);
    }

    public function updateThisUser($data, $IdUser)
    {
        $IdUser = htmlspecialchars(trim(strip_tags($IdUser)));
        $data['nom'] = htmlspecialchars(trim(strip_tags($data['nom'])));
        $data['prenom'] = htmlspecialchars(trim(strip_tags($data['prenom'])));
        $data['password'] = htmlspecialchars(trim(strip_tags($data['password'])));
        $data['passwordBis'] = htmlspecialchars(trim(strip_tags($data['passwordBis'])));
        $data['adressePostale'] = htmlspecialchars(trim(strip_tags($data['adressePostale'])));
        $data['telephone'] = htmlspecialchars(trim(strip_tags($data['telephone'])));
        $data['email'] = htmlspecialchars(trim(strip_tags($data['email'])));

        if (empty($data['password'])) {
            $Password = $data['password'];
        }

        if ($data['password'] === $data['passwordBis'] && strlen($data['password']) >= 8) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data = [
                'Id_User' => $IdUser,
                'LastName' => $data['nom'],
                'FirstName' => $data['prenom'],
                'Password' => $data['password'],
                'Address' => $data['adressePostale'],
                'Telephone' => $data['telephone'],
                'UserRole' => 0,
                'Mail' => $data['email']
            ];
        }
        $user = new User($data);

        if (isset($user) && !empty($user)) {
            if ($this->UserRepo->updateThisUser($user)) {
                // $this->authentication($user->getMail(), $Password);
            }
        } else {
        }
    }
}
