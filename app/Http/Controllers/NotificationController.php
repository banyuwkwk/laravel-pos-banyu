<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationService;

class NotificationController extends Controller
{
    public function __construct(
        protected NotificationService $service
    ) {}

    public function index(Request $request)
    {
        $status = $request->status;

        return view(
            'notifications.index',
            [

                'notifications' => $this->service->paginate($status),

                'statistics' => $this->service->statistics(),

                'status' => $status,

            ]
        );
    }

    public function markAsRead(string $id)
    {
        $this->service->markAsRead($id);

        return back();
    }

    public function markAllAsRead()
    {
        $this->service->markAllAsRead();

        return back();
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return back();
    }

    public function clearRead()
    {
        $this->service->clearRead();

        return back()
            ->with('success', 'Read notifications cleared');
    }
}