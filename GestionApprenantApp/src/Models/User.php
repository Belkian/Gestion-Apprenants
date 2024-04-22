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
    private $RoleName;

    private $IdClasse;
    private $NomClasse;
    private $DateDebut;
    private $DateFin;
    private $NombreApprenant;

    use Hydratation;


    /**
     * Get the value of IdUser
     */
    public function getIdUser()
    {
        return $this->IdUser;
    }

    /**
     * Set the value of IdUser
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

    /**
     * Get the value of IdClasse
     */
    public function getIdClasse()
    {
        return $this->IdClasse;
    }

    /**
     * Set the value of IdClasse
     */
    public function setIdClasse($IdClasse): self|null
    {
        $this->IdClasse = $IdClasse;

        return $this;
    }

    /**
     * Get the value of NomClasse
     */
    public function getNomClasse()
    {
        return $this->NomClasse;
    }

    /**
     * Set the value of NomClasse
     */
    public function setNomClasse($NomClasse): self|null
    {
        $this->NomClasse = $NomClasse;

        return $this;
    }

    /**
     * Get the value of DateDebut
     */
    public function getDateDebut()
    {
        return $this->DateDebut;
    }

    /**
     * Set the value of DateDebut
     */
    public function setDateDebut($DateDebut)
    {
        $this->DateDebut = $DateDebut;
        return $this;
    }

    /**
     * Get the value of DateFin
     */
    public function getDateFin()
    {
        return $this->DateFin;
    }

    /**
     * Set the value of DateFin
     */
    public function setDateFin($DateFin): self | null
    {
        $this->DateFin = $DateFin;
        return $this;
    }

    /**
     * Get the value of RoleName
     */
    public function getRoleName()
    {
        return $this->RoleName;
    }

    /**
     * Set the value of RoleName
     */
    public function setRoleName($RoleName): self | null
    {
        $this->RoleName = $RoleName;

        return $this;
    }

    /**
     * Get the value of NombreApprenant
     */
    public function getNombreApprenant()
    {
        return $this->NombreApprenant;
    }

    /**
     * Set the value of NombreApprenant
     */
    public function setNombreApprenant($NombreApprenant): self | null
    {
        $this->NombreApprenant = $NombreApprenant;

        return $this;
    }
}
