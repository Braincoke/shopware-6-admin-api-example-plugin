<?php declare(strict_types=1);

namespace braincoke\AdminApiExample\Controller;

use Shopware\Core\Framework\Routing\Annotation\RouteScope;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @RouteScope(scopes={"api"})
 */
class AdminApiController extends AbstractController
{
    /**
     * @Route("/api/v{version}/example/my-api-action", name="api.action.example.my-api-action", methods={"GET"})
     */
    public function myFirstApi(): JsonResponse
    {
        return new JsonResponse(['You successfully created your first controller route']);
    }
}