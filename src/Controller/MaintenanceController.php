<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class MaintenanceController {
    function maintenance(){
        return new Response("maintenance");
    }
}