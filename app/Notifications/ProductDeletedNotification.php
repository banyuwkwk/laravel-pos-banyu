<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ProductDeletedNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected string $productName
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [

            'title' => 'Product Deleted',

            'message' => "Product {$this->productName} has been deleted.",

            'type' => 'product_deleted',

            'icon' => 'bi-trash',

            'color' => 'danger',

        ];
    }
}