<?php

namespace src\Models;

use src\Services\Hydratation;

class AllInformationUser
{

    private Cours $Cours;
    private User $User;
    private Classe $Classe;

    use Hydratation;



    /**
     * Get the value of Cours
     */
    public function getCours(): Cours
    {
        return $this->Cours;
    }

    /**
     * Set the value of Cours
     */
    public function setCours(Cours $Cours): self
    {
        $this->Cours = $Cours;

        return $this;
    }

    /**
     * Get the value of User
     */
    public function getUser(): User
    {
        return $this->User;
    }

    /**
     * Set the value of User
     */
    public function setUser(User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * Get the value of Classe
     */
    public function getClasse(): Classe
    {
        return $this->Classe;
    }

    /**
     * Set the value of Classe
     */
    public function setClasse(Classe $Classe): self
    {
        $this->Classe = $Classe;

        return $this;
    }
}
