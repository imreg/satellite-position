<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Application\Service\Interfaces\IssServiceInterface;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class IssController extends AbstractFOSRestController
{
    /**
     * ISS id
     */
    const ISS = 25544;

    /**
     * @var IssServiceInterface
     */
    private $issService;

    /**
     * IssController constructor.
     * @param IssServiceInterface $issService
     */
    public function __construct(IssServiceInterface $issService)
    {
        $this->issService = $issService;
    }

    /**
     * @Rest\Get("/position")
     * @param Request $request
     * @return View
     */
    public function getPosition(Request $request): View
    {
        $issId = (int)$request->get('iss', static::ISS);
        $result = $this->issService->position($issId);
        return View::create($result, Response::HTTP_CREATED);
    }

    /**
     * @Rest\Get("/distance")
     * @param Request $request
     * @return View
     */
    public function getDistance(Request $request): View
    {
        $long = (float)$request->get('long', 0);
        $lat = (float)$request->get('lat', 0);
        $issId = (int)$request->get('iss', static::ISS);

        $result = $this->issService->distance($issId, $lat, $long);
        return View::create($result, Response::HTTP_CREATED);
    }
}
