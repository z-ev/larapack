<?php

namespace Darkjinnee\Footing\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class DeviceCollection
 * @package Darkjinnee\Footing\Http\Resources
 */
class DeviceCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
