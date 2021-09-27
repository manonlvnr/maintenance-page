<?php
namespace App\Controller\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\RequestEvent;


class MaintenanceListener
{
    public function onKernelRequest(requestEvent $event){
        $event->setResponse(
            new Response('En maintenance',
            Response::HTTP_SERVICE_UNAVAILABLE
            )
        ); 
        $event->stopPropagation();
    }
}
