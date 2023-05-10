<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email'
    ];

    protected $table = 'customers';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contactInformation(): MorphOne
    {
        return $this->morphOne(ContactInformation::class, 'object');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
