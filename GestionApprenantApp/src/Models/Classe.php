<?php

namespace src\Models;

use src\Services\Hydratation;


class Classe
{
    private $IdClasse;
    private $NomClasse;
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
     * Get the value of NomClasse
     */
    public function getNomClasse()
    {
        return $this->NomClasse;
    }

    /**
     * Set the value of NomClasse
     */
    public function setNomClasse($NomClasse): self
    {
        $this->NomClasse = $NomClasse;

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
    public function setDateFin($DateFin)
    {
        $this->DateFin = $DateFin;
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
    }
}
