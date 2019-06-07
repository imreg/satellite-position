<?php
declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Service\Interfaces\CalculationServiceInterface;

class CalculationService implements CalculationServiceInterface
{
    /**
     * @inheritDoc
     */
    public function distance(float $latitude, float $longitude, float $latitudeISS, float $longitudeISS): float
    {
        $expLatitude = pow(($latitude - $latitudeISS), 2);
        $expLongitude = pow(($longitude - $longitudeISS), 2);

        return sqrt($expLatitude + $expLongitude);
    }
}
