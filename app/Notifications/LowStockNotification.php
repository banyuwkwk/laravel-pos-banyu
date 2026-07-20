<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class LowStockNotification extends Notification
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

            'title' => 'Low Stock',

            'message' => "Product {$this->product->name} only has {$this->product->stock} stock remaining.",

            'product_id' => $this->product->id,

            'type' => 'low_stock',

            'icon' => 'bi-exclamation-triangle',

            'color' => 'warning',

            'url' => route('products.index'),

        ];
    }
}