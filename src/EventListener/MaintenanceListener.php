<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class MaintenanceListener extends AbstractController
{
    public bool $maintenance;

    public function __construct(bool $maintenance)
    {
        $this->maintenance=$maintenance;
    }

    public function onKernelRequest(RequestEvent $event, bool $maintenance)
    {
        $maintenance = $this->maintenance;
        
        if ($maintenance === true) {
            $template = $this->renderView('maintenance.html.twig');
            $event->setResponse(
                new Response($template,
                Response::HTTP_SERVICE_UNAVAILABLE)); 
            $event->stopPropagation();
        }
    }
}
