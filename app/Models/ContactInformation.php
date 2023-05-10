<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'company_name',
        'address',
        'address2',
        'zip',
        'city',
        'state',
        'country',
        'phone'
    ];

    protected $table = 'contact_informations';

    public function object()
    {
        return $this->morphTo();
    }
}
