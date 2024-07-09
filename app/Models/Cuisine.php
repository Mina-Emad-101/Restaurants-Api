<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Restaurant> $restaurants
 * @property-read int|null $restaurants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cuisine whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cuisine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class);
    }
}
