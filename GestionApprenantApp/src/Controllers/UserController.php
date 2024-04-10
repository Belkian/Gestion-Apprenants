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

    public function index()
    {
        include_once __DIR__ . '/../Views/dashboard.php';
    }

    public function registerUser($data)
    {
        foreach ($data as $key => $value) {
            if (!is_array($value)) {
                $data[$key] = htmlspecialchars($value);
            }
        }
        $data['nom'] = htmlspecialchars(trim(strip_tags($data['nom'])));
        $data['prenom'] = htmlspecialchars(trim(strip_tags($data['prenom'])));
        $data['password'] = htmlspecialchars(trim(strip_tags($data['password'])));
        $data['passwordBis'] = htmlspecialchars(trim(strip_tags($data['passwordBis'])));
        $data['adressePostale'] = htmlspecialchars(trim(strip_tags($data['adressePostale'])));
        $data['telephone'] = htmlspecialchars(trim(strip_tags($data['telephone'])));
        $data['email'] = htmlspecialchars(trim(strip_tags($data['email'])));

        if ($data['password'] === $data['passwordBis'] && strlen($data['password']) >= 8) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data = [
                'LastName' => $data['nom'],
                'FirstName' => $data['prenom'],
                'Password' => $data['password'],
                'Address' => $data['adressePostale'],
                'Telephone' => $data['telephone'],
                'UserRole' => 0,
                'Mail' => $data['email']
            ];
            $user = new User($data);
            if (isset($user) && !empty($user)) {
                $this->UserRepo->saveUser($user);
            }
        } else {
        }
    }

    public function authentication($data)
    {
        $data = file_get_contents('php://input');
        $array = json_decode($data, true);
        if (!empty($array) && isset($array)) {
            if ($User = $this->UserRepo->getThisUser($array['Email'])) {
                if (password_verify($array['Password'], $User->getPassword())) {
                    $_SESSION['connecté'] = TRUE;
                    $_SESSION['user'] = serialize($User);
                    $this->render('dashboard');
                } else {
                }
            } else {
            }
        }
    }

    public function deleteUser($id)
    {
        $User = $this->UserRepo->deleteThisUser($id);
        header('location: ' . HOME_URL . 'connexion');
    }

    public function monProfil()
    {
        $User = unserialize($_SESSION['user']);
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
