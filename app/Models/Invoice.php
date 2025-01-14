<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural of the model name
    protected $table = 'invoices';

    // Specify the fields that can be mass assigned
    protected $fillable = [
        'user_id',
        'order_id', // Link to the order
        'total_amount',
        'invoice_number',
        'status', // e.g., paid/unpaid
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship to the user who owns this invoice.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship to the order associated with this invoice.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
