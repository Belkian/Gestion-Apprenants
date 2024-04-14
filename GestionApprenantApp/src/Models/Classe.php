<?php

namespace src\Models;

use src\Services\Hydratation;

class Classe
{
    private $IdClasse;
    private $Nom;
    private $NombreApprenant;
    private $DateDebut;
    private $DateFin;

    use Hydratation;

    /**
     * Get the value of IdClass
     */
    public function getIdClasse()
    {
        return $this->IdClasse;
    }

    /**
     * Set the value of IdClass
     */
    public function setIdClasse($IdClasse): self
    {
        $this->IdClasse = $IdClasse;

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
     * Get the value of NombreApprenant
     */
    public function getNombreApprenant()
    {
        return $this->NombreApprenant;
    }

    /**
     * Set the value of NombreApprenant
     */
    public function setNombreApprenant($NombreApprenant): self
    {
        $this->NombreApprenant = $NombreApprenant;

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
    public function setDateFin($DateFin): self
    {
        $this->DateFin = $DateFin;

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
    public function setDateDebut($DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }
}
