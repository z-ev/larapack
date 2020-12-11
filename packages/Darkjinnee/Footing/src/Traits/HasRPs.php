<?php


namespace Darkjinnee\Footing\Traits;

use Illuminate\Support\Collection;

/**
 * Trait HasRPs
 * @package Darkjinnee\Footing\Traits
 */
trait HasRPs
{
    use HasRoles, HasPermissions;

    /**
     * @return Collection
     */
    public function masks(): Collection
    {
        $this->load('roles.permissions', 'permissions');
        $masks = collect();

        $this->roles->each(function ($item) use ($masks) {
            $masks->push($item->permissions->pluck('mask'));
        });
        $masks->push($this->permissions->pluck('mask'));

        $masks = $masks->flatten();
        $duplicatesKeys = $masks->duplicates()->keys();

        return $masks->except($duplicatesKeys)->values();
    }
}
