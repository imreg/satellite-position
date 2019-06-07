<?php


namespace App\Application\Service\Interfaces;

interface CalculationServiceInterface
{
    /**
     * @param float $latitude
     * @param float $longitude
     * @param float $latitudeISS
     * @param float $longitudeISS
     * @return float
     */
    public function distance(float $latitude, float $longitude, float $latitudeISS, float $longitudeISS): float;
}
