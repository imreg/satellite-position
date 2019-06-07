<?php
declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Service\Interfaces\ApiServiceInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use App\Application\Service\Exceptions\ApiServiceException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class SatellitesApiService implements ApiServiceInterface
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * URL
     */
    const URL = 'https://api.wheretheiss.at/v1';

    /**
     * SatellitesApiService constructor.
     * @param HttpClientInterface $client
     */
    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $query
     * @return array
     * @throws ApiServiceException
     */
    private function getQuery(string $query): array
    {
        try {
            return $this->client->request('GET', static::URL . $query)->toArray();
        } catch (ClientExceptionInterface $clientException) {
            throw new ApiServiceException($clientException->getMessage());
        } catch (RedirectionExceptionInterface $redirectionException) {
            throw new ApiServiceException($redirectionException->getMessage());
        } catch (ServerExceptionInterface $serverException) {
            throw new ApiServiceException($serverException->getMessage());
        } catch (TransportExceptionInterface $transaction) {
            throw new ApiServiceException($transaction->getMessage());
        }
    }

    /**
     * @inheritDoc
     */
    public function getSatelliteById(int $id): array
    {
        return $this->getQuery('/satellites/' . $id);
    }
}
