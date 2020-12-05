<?php

namespace Darkjinnee\Footing\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Darkjinnee\Footing\Footing;
use Darkjinnee\Footing\Http\Requests\Register;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Class RegisterController
 * @package Darkjinnee\Footing\Http\Controllers
 */
class RegisterController extends Controller
{
    /**
     * @param Register $request
     * @param Footing $footing
     * @return JsonResponse
     */
    public function __invoke(Register $request, Footing $footing)
    {
        $agent = $footing->agent();
        $input = $request->all();

        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        $tokenName = $request->has('token_name') ? $input['token_name'] : $agent['user_agent'];
        $token = $user->createToken($tokenName);

        $user->createDevice($token->accessToken->id, $agent);

        return response()->json([
            'message' => 'Registration completed successfully.',
            'date' => [
                'token' => $token->plainTextToken
            ]
        ], 200);
    }
}
