<?php

namespace App\Models\Commons;

use App\Enums\Countries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'demographics_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'street_extended',
        'city',
        'state',
        'postal_code',
        'country'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'country' => Countries::class,
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['complete'];

    /**
     * complete accessor
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function complete(): Attribute
    {
        $addVal = (!empty($this->street_extended)) ? "{$this->street} {$this->street_extended}" : "{$this->street}";
        if (!empty($this->street) && !empty($this->city) && !empty($this->postal_code)) {
            return new Attribute(
                get: fn() => "{$addVal}<br />{$this->city}<br />{$this->state} {$this->postal_code}",
            );
        } else {
            return new Attribute(get: fn() => null);
        }
    }
}
