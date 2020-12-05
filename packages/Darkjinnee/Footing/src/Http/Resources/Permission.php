<?php

namespace Darkjinnee\Footing\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class Permission
 * @package Darkjinnee\Footing\Http\Resources
 */
class Permission extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mask' => $this->mask,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
