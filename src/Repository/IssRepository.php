<?php
declare(strict_types=1);

namespace App\Repository;

use App\Application\Service\Exceptions\ApiServiceException;
use App\Application\Service\Interfaces\ApiServiceInterface;
use App\Repository\Interfaces\IssRepositoryInterface;

/**
 * Class IssRepository
 * @package App\Repository
 */
class IssRepository implements IssRepositoryInterface
{
    /**
     * @var ApiServiceInterface
     */
    private $apiService;

    /**
     * IssRepository constructor.
     * @param ApiServiceInterface $apiService
     */
    public function __construct(ApiServiceInterface $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * @inheritDoc
     */
    public function find($id): array
    {
        try {
            return $this->apiService->getSatelliteById($id);
        } catch (ApiServiceException $apiServiceException) {
            return ['error' => $apiServiceException->getMessage()];
        }
    }
}
