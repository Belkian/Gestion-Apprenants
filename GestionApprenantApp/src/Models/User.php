<?php

namespace src\Models;

use src\Services\Hydratation;

class User
{
    private $IdUser;
    private $Nom;
    private $Prenom;
    private $Password;
    private $Email;
    private $IdRole;

    use Hydratation;



    /**
     * Get the value of Id
     */
    public function getIdUser()
    {
        return $this->IdUser;
    }

    /**
     * Set the value of Id
     */
    public function setIdUser($IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    /**
     * Get the value of Nom
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * Set the value of Nom
     */
    public function setNom($Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    /**
     * Get the value of Prenom
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set the value of Prenom
     */
    public function setPrenom($Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * Get the value of Password
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set the value of Password
     */
    public function setPassword($Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * Get the value of Email
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     */
    public function setEmail($Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of IdRole
     */
    public function getIdRole()
    {
        return $this->IdRole;
    }

    /**
     * Set the value of IdRole
     */
    public function setIdRole($IdRole): self
    {
        $this->IdRole = $IdRole;

        return $this;
    }
}
