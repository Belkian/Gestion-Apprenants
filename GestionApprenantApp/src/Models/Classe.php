<?php

namespace src\Models;

use src\Services\Hydratation;

class Classe
{
    private $IdClass;
    private $Nom;
    private $NombreApprenant;

    use Hydratation;

    /**
     * Get the value of IdClass
     */
    public function getIdClass()
    {
        return $this->IdClass;
    }

    /**
     * Set the value of IdClass
     */
    public function setIdClass($IdClass): self
    {
        $this->IdClass = $IdClass;

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
}
