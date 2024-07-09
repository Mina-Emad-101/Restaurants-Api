<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property int $location_id
 * @property string $url
 * @property string $name
 * @property string $address
 * @property string|null $number
 * @property string|null $timings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cuisine> $cuisines
 * @property-read int|null $cuisines_count
 * @property-read \App\Models\Location $location
 * @method static \Database\Factories\RestaurantFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereTimings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUrl($value)
 * @mixin \Eloquent
 */
class Restaurant extends Model
{
    use HasFactory;

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function cuisines(): BelongsToMany
    {
        return $this->belongsToMany(Cuisine::class);
    }
}
