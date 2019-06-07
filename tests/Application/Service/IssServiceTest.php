<?php
declare(strict_types=1);

namespace App\Tests\Application\Service;

use App\Application\Service\CalculationService;
use App\Application\Service\Interfaces\ApiServiceInterface;
use App\Application\Service\IssService;
use App\Repository\IssRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class IssServiceTest
 * @package App\Tests\Application\Service
 */
class IssServiceTest extends TestCase
{
    public function testPosition()
    {
        $apiService = $this->createMock(ApiServiceInterface::class);
        $apiService->expects($this->any())
            ->method('getSatelliteById')
            ->willReturn([
                'name' => 'iss',
                'longitude' => -49.326103476009,
                'latitude' => 126.97337025677
            ]);

        $issService = new IssService(
            new IssRepository($apiService),
            new CalculationService()
        );
        $result = $issService->position(1234);
        $this->assertEquals([
            'latitude' => 126.97337025677,
            'longitude' => -49.326103476009
        ], $result);
    }

    public function testDistance()
    {
        $apiService = $this->createMock(ApiServiceInterface::class);
        $apiService->expects($this->any())
            ->method('getSatelliteById')
            ->willReturn([
                'name' => 'iss',
                'latitude' => 7.0,
                'longitude' => 8.0,
            ]);

        $issService = new IssService(
            new IssRepository($apiService),
            new CalculationService()
        );

        $result = $issService->distance(1234, 3.0, 2.0);
        $this->assertEquals(['distance' => 7.211102550927978], $result);
    }
}
