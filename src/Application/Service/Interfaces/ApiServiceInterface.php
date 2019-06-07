<?php

namespace App\Application\Service\Interfaces;

use App\Application\Service\Exceptions\ApiServiceException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

interface ApiServiceInterface
{
    /**
     * SatellitesApiService constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client);

    /**
     * @param int $id
     * @return array
     * @throws ApiServiceException
     */
    public function getSatelliteById(int $id): array;
}
