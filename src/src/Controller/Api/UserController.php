<?php
declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/user", name="auth_")
 */
class UserController extends BaseApiController
{
    /**
     * @Route("/info", name="user_info")
     * @param Serializer $serializer
     * @return JsonResponse
     * @throws ExceptionInterface
     */
    public function userData(SerializerInterface $serializer): JsonResponse
    {
        $user = $this->getUser();
        $response = $serializer->normalize($user, 'array', ['groups' => ['api']]);
        return $this->getJsonResponse(['data' => $response]);
    }
}