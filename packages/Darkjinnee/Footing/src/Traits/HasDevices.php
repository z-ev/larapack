<?php

namespace Darkjinnee\Footing\Traits;

use Darkjinnee\Footing\Models\Device;

/**
 * Trait HasDevices
 * @package Darkjinnee\Footing\Traits
 */
trait HasDevices
{
    /**
     * @param int $tokenId
     * @param array $agent
     */
    public function createDevice(int $tokenId, array $agent)
    {
        $this->devices()->create([
            'token_id' => $tokenId,
            'user_agent' => $agent['user_agent'],
            'ip' => $agent['ip'],
        ]);
    }

    /**
     * @return mixed
     */
    public function devices()
    {
        return $this->morphMany(Device::class, 'model');
    }
}
