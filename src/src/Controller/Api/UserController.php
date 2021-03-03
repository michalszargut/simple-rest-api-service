<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/user", name="auth_")
 */
class UserController extends BaseApiController
{
    /**
     * @Route("/info", name="user_info", methods={"GET"})
     * @param SerializerInterface $serializer
     * @return JsonResponse
     * @throws ExceptionInterface
     */
    public function userData(SerializerInterface $serializer): JsonResponse
    {
        $user = $this->getDoctrine()->getRepository(User::class)
            ->findOneBy(['username' => $this->getUser()->getUsername()]);
        $response = $serializer->normalize($user, 'array', ['groups' => ['api']]);
        return $this->getJsonResponse(['data' => $response]);
    }
}