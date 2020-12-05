<?php

namespace Darkjinnee\Footing;

use Illuminate\Http\Request;

/**
 * Class Footing
 * @package Darkjinnee\Footing
 */
class Footing
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * Footing constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return array
     */
    public function agent()
    {
        return [
            'user_agent' => $this->request->headers->has('User-Agent') ? $this->request->header('User-Agent') : null,
            'ip' => $this->request->getClientIp()
        ];
    }
}
