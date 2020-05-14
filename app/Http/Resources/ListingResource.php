<?php

namespace App\Http\Resources;

use App\Supports\ApiSettings;
use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    
    use ApiSettings;
    
    public function toArray($request)
    {
        $listing = [
            'id'               => $this->id,
            'name'             => $this->list_name,
            'address'          => $this->address,
            'distance'         => number_format($this->distance, 3),
            'submitter'        => new UserResource($this->user),
        ];

        return $listing;
    }
}
