<?php
declare(strict_types=1);

namespace App\Tests\Repository;

use App\Application\Service\Interfaces\ApiServiceInterface;
use App\Repository\IssRepository;
use PHPUnit\Framework\TestCase;

/**
 * Class IssRepositoryTest
 * @package App\Tests\Repository
 */
class IssRepositoryTest extends TestCase
{
    public function testFind()
    {
        $apiService = $this->createMock(ApiServiceInterface::class);
        $apiService->expects($this->any())
            ->method('getSatelliteById')
            ->willReturn([
                'name' => 'iss',
                'latitude' => 7.0,
                'longitude' => 8.0,
            ]);

        $issRepository = new IssRepository($apiService);
        $result = $issRepository->find(1234);
        $this->assertEquals([
            'name' => 'iss',
            'latitude' => 7.0,
            'longitude' => 8.0,
        ], $result);
    }
}
