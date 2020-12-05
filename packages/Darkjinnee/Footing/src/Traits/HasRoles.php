<?php

namespace Darkjinnee\Footing\Traits;

use Darkjinnee\Footing\Models\Role;

/**
 * Trait HasRoles
 * @package Darkjinnee\Footing\Traits
 */
trait HasRoles
{
    /**
     * @param array $rolesId
     * @return mixed
     */
    public function attachRoles(array $rolesId)
    {
        return $this->roles()->attach($rolesId);
    }

    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->morphToMany(Role::class, 'model', 'models_has_roles');
    }

    /**
     * @param array $rolesId
     * @return mixed
     */
    public function detachRoles(array $rolesId)
    {
        return $this->roles()->detach($rolesId);
    }

    /**
     * @param array $rolesId
     * @return mixed
     */
    public function syncRoles(array $rolesId)
    {
        return $this->roles()->sync($rolesId);
    }
}
