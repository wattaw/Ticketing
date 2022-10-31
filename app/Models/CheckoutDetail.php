<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CheckoutDetail extends Model
{
    use HasFactory;
        /**
     * Get the Event that owns the Checkout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
