<?php

namespace Darkjinnee\Footing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Darkjinnee\Footing\Contracts\Permission as PermissionContract;

/**
 * Class Permission
 * @package Darkjinnee\Footing\Models
 */
class Permission extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'mask'
    ];
    /**
     * @var string
     */
    protected $table = 'permissions';

    /**
     * @return MorphToMany
     */
    public function roles()
    {
        return $this->morphedByMany(Role::class, 'model', 'models_has_permissions');
    }
}
