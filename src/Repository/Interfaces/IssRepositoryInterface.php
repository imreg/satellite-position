<?php

namespace App\Repository\Interfaces;

use App\Application\Service\Exceptions\ApiServiceException;

/**
 * Interface IssRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface IssRepositoryInterface
{
    /**
     * @param $id
     * @return array
     */
    public function find($id): array;
}
