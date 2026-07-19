<?php

namespace App\Services;

use App\Repositories\Interfaces\ActivityLogRepositoryInterface;

class ActivityLogService
{
    public function __construct(
        protected ActivityLogRepositoryInterface $repository
    ) {}

    public function paginate(array $filters = [])
    {
        return $this->repository->paginate($filters);
    }
}