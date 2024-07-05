<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
