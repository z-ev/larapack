<?php

namespace Darkjinnee\Footing\Http\Requests;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Register
 * @package Darkjinnee\Footing\Http\Requests
 */
class Register extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return Repository|Application|mixed
     */
    public function rules()
    {
        return config('footing.auth.requests.register');
    }
}
