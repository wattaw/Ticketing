<?php

namespace App\Mail\Checkout;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Paid extends Mailable
{
    use Queueable, SerializesModels;

    private $checkout;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($checkout, $transaction_status)
    {
        $this->checkout = $checkout;
        $this->transaction_status = $transaction_status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Order Has Been Confirmed')->markdown('emails.checkout.paid', [
            'checkout' => $this->checkout,
            'transaction_status' => $this->transaction_status
        ]);
    }
}
