<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    protected $fillable = ['address', 'city', 'country'. 'postal_code', 'owner_id']; 

    /**
     * Get owners associated with an address.
     *
     * @return HasOne
     */
    public function owners(): HasOne
    {
        return $this->hasOne(Owner::class, 'id', 'owner_id');
    }

    /**
     * Get cars associated with an address.
     *
     * @return HasMany
     */
    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
}
