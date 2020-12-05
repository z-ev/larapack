<?php

namespace Darkjinnee\Footing\Http\Controllers;

use App\Http\Controllers\Controller;
use Darkjinnee\Footing\Http\Resources\Permission as PermissionResource;
use Darkjinnee\Footing\Http\Resources\PermissionCollection;
use Darkjinnee\Footing\Models\Permission;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PermissionController
 * @package Darkjinnee\Footing\Http\Controllers
 */
class PermissionController extends Controller
{
    /**
     * @return PermissionCollection
     */
    public function index()
    {
        return new PermissionCollection(Permission::paginate());
    }

    /**
     * @param Request $request
     * @return PermissionResource
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $permission = Permission::create($input);

        return new PermissionResource($permission);
    }

    /**
     * @param Permission $permission
     * @return PermissionResource
     */
    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    /**
     * @param Request $request
     * @param Permission $permission
     * @return PermissionResource
     */
    public function update(Request $request, Permission $permission)
    {
        $input = $request->all();
        $permission->update($input);

        return new PermissionResource($permission);
    }

    /**
     * @param Permission $permission
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->json([
            'message' => 'Permission delete successfully.',
        ], 200);
    }
}
