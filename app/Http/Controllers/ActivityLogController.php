<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivityLogService;
use App\Models\User;

class ActivityLogController extends Controller
{
    public function __construct(
        protected ActivityLogService $service
    ) {}

    public function index(Request $request)
    {
        $filters = $request->only([
            'user',
            'action',
            'start_date',
            'end_date'
        ]);

        return view(
            'activity-logs.index',
            [
                'logs' => $this->service->paginate($filters),

                'users' => User::all(),

                'filters' => $filters
            ]
        );
    }
}