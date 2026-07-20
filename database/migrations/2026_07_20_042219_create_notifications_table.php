<?php

namespace App\Notifications;

use App\Models\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class TransactionCreatedNotification extends Notification
{
    use Queueable;

    public function __construct(
        protected Transaction $transaction
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Transaction Created',

            'message' => "Invoice {$this->transaction->invoice_number} has been created.",

            'transaction_id' => $this->transaction->id,

            'type' => 'transaction',

            'icon' => 'bi-receipt',

            'color' => 'primary',
        ];
    }
}