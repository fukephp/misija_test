<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ContactInformation
 *
 * @property int $id
 * @property string $object_type
 * @property int $object_id
 * @property string $name
 * @property string $email
 * @property string|null $company_name
 * @property string $address
 * @property string|null $address2
 * @property string $country
 * @property string|null $state
 * @property string $city
 * @property string $zip
 * @property string|null $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $object
 * @method static \Database\Factories\ContactInformationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereObjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactInformation whereZip($value)
 * @mixin \Eloquent
 */
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
