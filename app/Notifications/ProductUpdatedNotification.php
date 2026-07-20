<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ProductUpdatedNotification extends Notification
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

            'title' => 'Product Updated',

            'message' => "Product {$this->product->name} has been updated.",

            'product_id' => $this->product->id,

            'type' => 'product_updated',

            'icon' => 'bi-pencil-square',

            'color' => 'primary',

        ];
    }
}