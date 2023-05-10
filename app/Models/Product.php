<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'availability'
    ];

    protected $table = 'products';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems() 
    {
        return $this->hasMany(Orderitem::class);   
    }

    /**
     * @param int $quanitiy
     */
    public function calculateTotalPrice(int $quanitiy = 0) 
    {
        $totalPrice = $this->price * $quanitiy;

        return $totalPrice;
    }
}
