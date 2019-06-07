<?php


namespace App\Application\Service\Interfaces;

interface IssServiceInterface
{
    /**
     * @param int $satelliteId
     * @return array
     */
    public function position(int $satelliteId): array;

    /**
     * @param int $satelliteId
     * @param $latitude
     * @param $longitude
     * @return array
     */
    public function distance(int $satelliteId, float $latitude, float $longitude): array;
}
