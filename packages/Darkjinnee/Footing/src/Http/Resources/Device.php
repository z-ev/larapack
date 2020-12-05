<?php

namespace Darkjinnee\Footing\Http\Resources;

use Darkjinnee\Footing\Http\Resources\Token as TokenResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Device
 * @package Darkjinnee\Footing\Http\Resources
 */
class Device extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'token_id' => $this->token_id,
            'user_id' => $this->user_id,
            'user_agent' => $this->user_agent,
            'ip' => $this->ip,
            'token' => new TokenResource($this->token),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
