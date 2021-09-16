<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class MaintenanceController extends AbstractController{
    public function __invoke(){
        return $this->render('home.html.twig');
    }
}