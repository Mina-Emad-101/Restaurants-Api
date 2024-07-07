<?php

namespace App\Filters;

use Illuminate\Http\Request;

interface Filter
{
    public function transform(Request $request): array;
}
