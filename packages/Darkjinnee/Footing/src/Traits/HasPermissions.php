<?php

namespace Darkjinnee\Footing\Traits;

use Darkjinnee\Footing\Models\Permission;

/**
 * Trait HasPermissions
 * @package Darkjinnee\Footing\Traits
 */
trait HasPermissions
{
    /**
     * @param array $permissionsId
     * @return mixed
     */
    public function attachPermissions(array $permissionsId = [])
    {
        return $this->permissions()->attach($permissionsId);
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'model', 'models_has_permissions');
    }

    /**
     * @param array $permissionsId
     * @return mixed
     */
    public function detachPermissions(array $permissionsId = [])
    {
        return $this->permissions()->detach($permissionsId);
    }

    /**
     * @param array $permissionsId
     * @return mixed
     */
    public function syncPermissions(array $permissionsId = [])
    {
        return $this->permissions()->sync($permissionsId);
    }
}
