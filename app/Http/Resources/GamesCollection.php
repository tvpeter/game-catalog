<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GamesCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'x-runtime' => microtime(true) - LARAVEL_START,
            'message' => 'Games retrieved successfully',
            'data' => $this->collection,
        ];
    }
}
