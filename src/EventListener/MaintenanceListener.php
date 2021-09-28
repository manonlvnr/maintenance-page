<?php
namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class MaintenanceListener
{
    public $maintenance;

    public function __construct($maintenance){
        $this->maintenance=$maintenance["status"];
    }

    public function onKernelRequest(RequestEvent $event){
        $maintenance = $this->maintenance ? $this->maintenance : false;
        if ($maintenance === true){
            $event->setResponse(
                new Response('En maintenance',
                Response::HTTP_SERVICE_UNAVAILABLE)); 
            $event->stopPropagation();
        }
    }
}
