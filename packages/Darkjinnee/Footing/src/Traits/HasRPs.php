<?php


namespace Darkjinnee\Footing\Traits;


trait HasRPs
{
    use HasRoles, HasPermissions;

    public function masks()
    {
        return $this->load('roles.permissions', 'permissions');
    }
}
