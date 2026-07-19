<?php

namespace App\Repositories;

use Spatie\Activitylog\Models\Activity;
use App\Repositories\Interfaces\ActivityLogRepositoryInterface;

class ActivityLogRepository implements ActivityLogRepositoryInterface
{
    public function paginate(array $filters = [])
    {
        $query = Activity::with('causer')
            ->latest();

        if (!empty($filters['user'])) {
            $query->where('causer_id', $filters['user']);
        }


        if (!empty($filters['action'])) {

            $query->where(
                'description',
                'like',
                $filters['action'].'%'
            );

        }


        if (!empty($filters['start_date'])) {

            $query->whereDate(
                'created_at',
                '>=',
                $filters['start_date']
            );

        }


        if (!empty($filters['end_date'])) {

            $query->whereDate(
                'created_at',
                '<=',
                $filters['end_date']
            );

        }


        return $query->paginate(10);
    }
}