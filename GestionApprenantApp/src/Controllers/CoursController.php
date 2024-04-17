<?php

namespace src\Controllers;

use src\Models\Cours;
use src\Repositories\CoursRepository;
use src\Services\Reponse;

class CoursController
{
    private $CoursRepo;
    use Reponse;

    public function __construct()
    {
        $this->CoursRepo = new CoursRepository;
    }

    public function CreerCode()
    {
        $this->CoursRepo->createCourCode();
    }
}
