<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

use Twig\Environment;

class MaintenanceListener
{
    public bool $maintenance;

    public function __construct(bool $maintenance, Environment $twig)
    {
        $this->maintenance = $maintenance;
        $this->twig = $twig;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if ($this->maintenance === true) {
            $event->setResponse(
                new Response(
                    $this->twig->render('maintenance.html.twig'),
                    Response::HTTP_SERVICE_UNAVAILABLE
                )
            ); 
            $event->stopPropagation();
        }
    }
}
