<?php

namespace App\Http\Resources;

use App\Supports\ApiSettings;
use Illuminate\Http\Resources\Json\JsonResource;

class EmptyResource extends JsonResource
{
    
    use ApiSettings;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
