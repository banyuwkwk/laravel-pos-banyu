<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Notifications\Notification;

use App\Repositories\Interfaces\NotificationRepositoryInterface;


class NotificationRepository implements NotificationRepositoryInterface
{
    public function paginate(?string $status = null)
    {
        $query = auth()
            ->user()
            ->notifications()
            ->latest();

        if ($status === 'unread') {

            $query->whereNull('read_at');

        }

        if ($status === 'read') {

            $query->whereNotNull('read_at');

        }

        return $query->paginate(10)
            ->withQueryString();
    }

    public function unreadCount()
    {
        return auth()
            ->user()
            ->unreadNotifications()
            ->count();
    }

    public function markAsRead(string $id)
    {
        $notification = auth()
            ->user()
            ->notifications()
            ->findOrFail($id);

        $notification->markAsRead();
    }

    public function markAllAsRead()
    {
        auth()
            ->user()
            ->unreadNotifications
            ->markAsRead();
    }

    public function latest(int $limit = 5)
    {
        if (!auth()->check()) {
            return collect();
        }

        return auth()
            ->user()
            ->notifications()
            ->latest()
            ->take($limit)
            ->get();
    }

    public function latestUnread(int $limit = 5)
    {
        if (!auth()->check()) {
            return collect();
        }

        return auth()
            ->user()
            ->unreadNotifications()
            ->latest()
            ->take($limit)
            ->get();
    }

    public function notifyAdmins(Notification $notification): void
    {
        User::role('Admin')
            ->get()
            ->each(function ($user) use ($notification) {

                $user->notify($notification);

            });
    }

    public function statistics(): array
    {
        $user = auth()->user();

        $total = $user->notifications()->count();

        $unread = $user->unreadNotifications()->count();

        return [

            'total' => $total,

            'unread' => $unread,

            'read' => $total - $unread,

        ];
    }

    public function delete(string $id)
    {
        return auth()->user()
            ->notifications()
            ->where('id', $id)
            ->delete();
    }

    public function clearRead()
    {
        return auth()
            ->user()
            ->notifications()
            ->whereNotNull('read_at')
            ->delete();
    }
}