<?php

namespace App\Http\Resources;

use App\Supports\ApiSettings;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        $user = [
            'id'               => $this->id,
            'name'             => $this->name,
            'email'            => $this->email,
        ];

        isset($this->access_token) ? $user['token'] = $this->access_token : '';

        return $user;
    }
}
