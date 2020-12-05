<?php

namespace Darkjinnee\Footing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Darkjinnee\Footing\Contracts\Role as RoleContract;

/**
 * Class Role
 * @package Darkjinnee\Footing\Models
 */
class Role extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];
    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @return MorphToMany
     */
    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'model', 'models_has_permissions');
    }
}
