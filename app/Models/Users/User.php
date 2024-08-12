<?php

namespace App\Models\Users;

use App\Models\Commons\Demographic;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'username';
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'is_active',
        'is_user_provider',
        'specialty',
        'npi',
        'federal_tax_id',
        'taxonomy',
        'aditional_information',
        'demographic_id',
        'password',
        'remember_token',
        'email_verified_at',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'is_active',
        'is_user_provider',
        'specialty',
        'npi',
        'federal_tax_id',
        'taxonomy',
        'aditional_information',
        'demographic_id',
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active'         => 'boolean',
            'is_user_provider'  => 'boolean',
            'password'          => 'hashed',
            'email_verified_at' => 'datetime',
        ];
    }


    /**
     * Demographic relationship of the model
     *
     * @return void
     */
    public function demographic()
    {
        return $this->hasOne(Demographic::class, 'id', 'demographic_id');
    }
}
