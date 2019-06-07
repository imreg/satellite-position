<?php
declare(strict_types=1);

namespace App\Tests\Application\Service;

use App\Application\Service\CalculationService;
use PHPUnit\Framework\TestCase;

/**
 * Class CalculationServiceTest
 * @package App\Tests\Application\Service
 */
class CalculationServiceTest extends TestCase
{
    private $calculation;

    protected function setUp()
    {
        parent::setUp();
        $this->calculation = new CalculationService();
    }

    /**
     * @param $latitude
     * @param $longitude
     * @param $latitudeISS
     * @param $longitudeISS
     * @param $expected
     * @dataProvider dataProvider
     */
    public function testDistance($latitude, $longitude, $latitudeISS, $longitudeISS, $expected)
    {
        $result = $this->calculation->distance($latitude, $longitude, $latitudeISS, $longitudeISS);
        $this->assertEquals($expected, round($result, 2));
    }

    public function dataProvider()
    {
        return [
            [0.0, 0.0, 0.0, 0.0, 0.0],
            [3.0, 2.0, 7.0, 8.0, 7.21],
            [-3.0, -2.0, 7.0, 8.0, 14.14]
        ];
    }
}
