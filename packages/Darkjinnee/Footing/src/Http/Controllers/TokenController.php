<?php

namespace Darkjinnee\Footing\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Darkjinnee\Footing\Footing;
use Darkjinnee\Footing\Http\Requests\Token;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Class TokenController
 * @package Darkjinnee\Footing\Http\Controllers
 */
class TokenController extends Controller
{
    /**
     * @param Token $request
     * @param Footing $footing
     * @return JsonResponse
     */
    public function __invoke(Token $request, Footing $footing)
    {
        $agent = $footing->agent();
        $input = $request->all();

        $username = config('footing.username');
        $developers = config('footing.developers');

        $user = User::where($username, $input[$username])->first();

        if (!$user || !Hash::check($input['password'], $user->password)) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'credentials' => 'The provided credentials are incorrect.'
                ],
            ], 422);
        }

        if ($user->role_id === null && !in_array($user[$username], $developers)) {
            return response()->json([
                'message' => 'User does not have role.',
                'errors' => [
                    'role' => 'User does not have role.'
                ]
            ], 401);
        }

        $tokenName = $request->has('token_name') ? $input['token_name'] : $agent['user_agent'];
        $token = $user->createToken($tokenName);

        $user->createDevice($token->accessToken->id, $agent);

        return response()->json([
            'message' => 'Token created successfully.',
            'date' => [
                'token' => $token->plainTextToken
            ]
        ], 200);
    }
}
