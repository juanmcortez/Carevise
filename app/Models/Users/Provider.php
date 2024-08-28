<?php

namespace App\Models\Users;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Provider extends User
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';


    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'username';
    }


    /**
     * The attributes that should be visible for serialization.
     *
     * @var array<int, string>
     */
    protected $visible = [
        'specialty',
        'npi',
        'federal_tax_id',
        'taxonomy',
        'aditional_information',
    ];


    /**
     * This function returns all the users that are set as a provider
     *
     * @return void
     */
    public static function allTheProviders()
    {
        return static::isUserProvider()
            ->whereIsActive(true)
            ->get();
    }


    /**
     * This function returns all the users that are set as a provider
     *
     * @return void
     */
    public static function allTheProvidersInactive()
    {
        return static::isUserProvider()
            ->whereIsActive(false)
            ->get();
    }
}
