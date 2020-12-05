<?php

namespace Darkjinnee\Footing\Http\Controllers;

use App\Http\Controllers\Controller;
use Darkjinnee\Footing\Http\Resources\Role as RoleResource;
use Darkjinnee\Footing\Http\Resources\RoleCollection;
use Darkjinnee\Footing\Models\Role;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class RoleController
 * @package Darkjinnee\Footing\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * @return RoleCollection
     */
    public function index()
    {
        return new RoleCollection(Role::paginate());
    }

    /**
     * @param Request $request
     * @return RoleResource
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $role = Role::create($input);
        $role->permissions()->sync($input['permissions']);

        return new RoleResource($role);
    }

    /**
     * @param Role $role
     * @return RoleResource
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * @param Request $request
     * @param Role $role
     * @return RoleResource
     */
    public function update(Request $request, Role $role)
    {
        $input = $request->all();
        $role->update($input);
        $role->permissions()->sync($input['permissions']);

        return new RoleResource($role);
    }

    /**
     * @param Role $role
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json([
            'message' => 'Role delete successfully.',
        ], 200);
    }
}
