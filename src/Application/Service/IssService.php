<?php
declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Service\Interfaces\CalculationServiceInterface;
use App\Application\Service\Interfaces\IssServiceInterface;
use App\Repository\Interfaces\IssRepositoryInterface;

final class IssService implements IssServiceInterface
{
    /**
     * @var IssRepositoryInterface
     */
    private $issRepository;

    /**
     * @var CalculationServiceInterface
     */
    private $calculationService;

    /**
     * IssService constructor.
     * @param IssRepositoryInterface $issRepository
     */
    public function __construct(IssRepositoryInterface $issRepository, CalculationServiceInterface $calculationService)
    {
        $this->issRepository = $issRepository;
        $this->calculationService = $calculationService;
    }

    /**
     * @inheritDoc
     */
    public function position(int $satelliteId): array
    {
        try {
            $result = $this->issRepository->find($satelliteId);
            return [
                'latitude' => $result['latitude'],
                'longitude' => $result['longitude']
            ];
        } catch (\Exception $exception) {
            return ['errors' => 'latitude and longitude error'];
        }
    }

    public function distance(int $satelliteId, float $latitude, float $longitude): array
    {
        try {
            $query = $this->issRepository->find($satelliteId);
            $result = $this->calculationService->distance(
                $latitude,
                $longitude,
                floatval($query['latitude']),
                floatval($query['longitude'])
            );
            return ['distance' => $result];
        } catch (\Exception $exception) {
            return ['errors' => 'latitude and longitude error'];
        }
    }
}
