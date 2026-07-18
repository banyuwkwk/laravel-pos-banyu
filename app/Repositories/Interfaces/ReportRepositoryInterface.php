<?php

namespace App\Repositories\Interfaces;

interface ReportRepositoryInterface
{
    public function salesReport(
        ?string $startDate = null,
        ?string $endDate = null
    );

    public function findTransaction(
        int $id
    );  
    
}