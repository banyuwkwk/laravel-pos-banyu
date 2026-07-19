<?php

namespace App\Repositories\Interfaces;

interface ActivityLogRepositoryInterface
{
    public function paginate(array $filters = []);
}