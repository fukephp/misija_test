<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_status',
    ];

    protected $table = 'orders';

    public const PAYMENT_STATUS = [
        0 => 'PENDING',
        1 => 'PAID',
        2 => 'NOT PAID',
        3 => 'RETURN',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer() 
    {
        return $this->belongsTo(Customer::class)->with('contactInformation');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems() 
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function shippingInformation(): MorphOne
    {
        return $this->morphOne(ContactInformation::class, 'object');
    }
}
