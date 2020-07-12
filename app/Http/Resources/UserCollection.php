<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
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
//            'message' => 'Players retrieved successfully',
            'data' => $this->collection,
        ];
    }
}
