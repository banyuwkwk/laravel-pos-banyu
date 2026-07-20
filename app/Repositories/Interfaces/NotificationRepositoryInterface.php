<?php

namespace App\Repositories\Interfaces;

use Illuminate\Notifications\Notification;

interface NotificationRepositoryInterface
{
    public function paginate(?string $status = null);

    public function unreadCount();

    public function markAsRead(string $id);

    public function markAllAsRead();

    public function latest(int $limit = 5); 

    public function latestUnread(int $limit = 5);

    public function notifyAdmins(Notification $notification): void;

    public function statistics(): array;

    public function delete(string $id);

    public function clearRead();
}