<?php

namespace Darkjinnee\Footing\Http\Controllers;

use App\Http\Controllers\Controller;
use Darkjinnee\Footing\Http\Resources\Device as DeviceResource;
use Darkjinnee\Footing\Http\Resources\DeviceCollection;
use Darkjinnee\Footing\Models\Device;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class DeviceController
 * @package Darkjinnee\Footing\Http\Controllers
 */
class DeviceController extends Controller
{
    /**
     * @return DeviceCollection
     */
    public function index()
    {
        return new DeviceCollection(Device::paginate());
    }

    /**
     * @param Request $request
     * @return DeviceResource
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $device = Device::create($input);

        return new DeviceResource($device);
    }

    /**
     * @param Device $device
     * @return DeviceResource
     */
    public function show(Device $device)
    {
        return new DeviceResource($device);
    }

    /**
     * @param Request $request
     * @param Device $device
     * @return DeviceResource
     */
    public function update(Request $request, Device $device)
    {
        $input = $request->all();
        $device->update($input);

        return new DeviceResource($device);
    }

    /**
     * @param Device $device
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return response()->json([
            'message' => 'Device delete successfully.',
        ], 200);
    }
}
