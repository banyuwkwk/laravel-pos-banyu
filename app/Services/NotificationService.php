<?php

namespace App\Services;

use App\Models\User;
use App\Models\Product;
use App\Notifications\LowStockNotification;
use App\Repositories\Interfaces\NotificationRepositoryInterface;

use Illuminate\Notifications\Notification;

class NotificationService
{
    public function __construct(
        protected NotificationRepositoryInterface $repository
    ) {}

    public function paginate(?string $status = null)
    {
        return $this->repository->paginate($status);
    }

    public function unreadCount()
    {
        return $this->repository->unreadCount();
    }

    public function markAsRead(string $id)
    {
        return $this->repository->markAsRead($id);
    }

    public function markAllAsRead()
    {
        return $this->repository->markAllAsRead();
    }

    public function latest(int $limit = 5)
    {
        return $this->repository->latest($limit);
    }

    public function latestUnread(int $limit = 5)
    {
        return $this->repository->latestUnread($limit);
    }

    public function notifyAdmins(Notification $notification): void
    {
        User::role('Admin')
            ->get()
            ->each(function ($user) use ($notification) {

                $user->notify($notification);

            });
    }

    public function hasUnreadLowStockNotification(Product $product): bool
    {
        return User::role('Admin')
            ->get()
            ->contains(function ($user) use ($product) {

                return $user->unreadNotifications()
                    ->where('data->type', 'low_stock')
                    ->where('data->product_id', $product->id)
                    ->exists();

            });
    }

    public function notifyLowStock(Product $product): void
    {
        if ($this->hasUnreadLowStockNotification($product)) {
            return;
        }

        $this->notifyAdmins(
            new LowStockNotification($product)
        );
    }

    public function statistics(): array
    {
        return $this->repository->statistics();
    }

    public function delete(string $id)
    {
        return $this->repository->delete($id);
    }

    public function clearRead()
    {
        return $this->repository->clearRead();
    }
}