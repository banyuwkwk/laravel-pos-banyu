<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ProductCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Product $product
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Product Created',

            'message' => "Product {$this->product->name} was created.",

            'product_id' => $this->product->id,

            'type' => 'product',

            'icon' => 'bi-plus-circle',

            'color' => 'success',
        ];
    }
}