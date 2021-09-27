<?php
namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class MaintenanceListener
{
    public function onKernelRequest(RequestEvent $event){
        $event->setResponse(
            new Response('En maintenance',
            Response::HTTP_SERVICE_UNAVAILABLE
            )
        ); 
        $event->stopPropagation();
    }
}
