<?php
declare(strict_types=1);

namespace App\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;

class AuthenticationFailureListener
{
    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onJWTInvalid(AuthenticationFailureEvent $event): void
    {
        $response = new JWTAuthenticationFailureResponse('Token is invalid');

        $event->setResponse($response);
    }

    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event): void
    {
        $response = new JWTAuthenticationFailureResponse('Bad credentials');

        $event->setResponse($response);
    }

    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onJWTNotFound(AuthenticationFailureEvent $event): void
    {
        $response = new JWTAuthenticationFailureResponse('Token not found');

        $event->setResponse($response);
    }
}