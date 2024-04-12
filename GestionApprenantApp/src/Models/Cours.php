<?php

namespace src\Models;

use src\Services\Hydratation;

class Cours
{

    private $IdCours;
    private $DatetimeDebut;
    private $DatetimeFin;
    private $Code;
    private $IdClass;

    use Hydratation;



    /**
     * Get the value of IdCours
     */
    public function getIdCours()
    {
        return $this->IdCours;
    }

    /**
     * Set the value of IdCours
     */
    public function setIdCours($IdCours): self
    {
        $this->IdCours = $IdCours;

        return $this;
    }

    /**
     * Get the value of DatetimeDebut
     */
    public function getDatetimeDebut()
    {
        return $this->DatetimeDebut;
    }

    /**
     * Set the value of DatetimeDebut
     */
    public function setDatetimeDebut($DatetimeDebut): self
    {
        $this->DatetimeDebut = $DatetimeDebut;

        return $this;
    }

    /**
     * Get the value of DatetimeFin
     */
    public function getDatetimeFin()
    {
        return $this->DatetimeFin;
    }

    /**
     * Set the value of DatetimeFin
     */
    public function setDatetimeFin($DatetimeFin): self
    {
        $this->DatetimeFin = $DatetimeFin;

        return $this;
    }

    /**
     * Get the value of Code
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * Set the value of Code
     */
    public function setCode($Code): self
    {
        $this->Code = $Code;

        return $this;
    }

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
}
