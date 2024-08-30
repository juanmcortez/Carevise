<?php

namespace App\Models\Commons;

use Carbon\Carbon;
use App\Enums\Title;
use App\Enums\Gender;
use App\Models\Commons\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demographic extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'gender',
        'address_id',
        // 'phone_id',
        // 'cellphone_id',
        // 'email_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id',
        'address_id',
        // 'phone_id',
        // 'cellphone_id',
        // 'email_id',
        'address',
        // 'phone',
        // 'cellphone',
        // 'email',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['complete_name', 'age'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'title'         => Title::class,
            'gender'        => Gender::class,
            'date_of_birth' => 'date',
        ];
    }

    /**
     * complete_name accessor
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function completeName(): Attribute
    {
        if (!empty($this->first_name) && !empty($this->last_name)) {
            $namVal = (!empty($this->middle_name)) ? "{$this->first_name} {$this->middle_name}" : "{$this->first_name}";
            return new Attribute(
                get: fn() => "{$this->last_name}, {$namVal}",
            );
        } else {
            return new Attribute(get: fn() => null);
        }
    }

    /**
     * age accessor
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function age(): Attribute
    {
        if (!empty($this->date_of_birth)) {
            return new Attribute(
                get: fn() => Carbon::parse($this->date_of_birth)->age,
            );
        } else {
            return new Attribute(get: fn() => null);
        }
    }

    /**
     * Address relationship of the model
     *
     * @return void
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'id', 'address_id')->withDefault();
    }
}
