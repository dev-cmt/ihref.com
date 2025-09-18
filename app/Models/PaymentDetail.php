<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;

    /**
     * Table name (optional because Laravel can infer it,
     * but it's good to be explicit).
     */
    protected $table = 'payment_details';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'payment_date',
        'amount_paid',
        'payment_number',
        'transaction_number',
        'transaction_id',
        'transfer_number',
        'payment_type',
        'reason',
        'message',
        'slip',
        'status',
        'registration_id',
        'user_id',
    ];

    /**
     * Attribute type casting.
     */
    protected $casts = [
        'payment_date' => 'date',
        'paid_amount'  => 'decimal:2',
        'status'       => 'boolean',
    ];

    /* -------------------------------------------------
     |  Relationships (uncomment if related models exist)
     |--------------------------------------------------
     */

    // If you have a Registration model
    public function member()
    {
        return $this->belongsTo(Registration::class, 'registration_id');
    }

    // If you have a User model
    public function approveBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
