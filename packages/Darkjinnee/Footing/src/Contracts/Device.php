<?php


namespace Darkjinnee\Footing\Contracts;


/**
 * Interface Device
 * @package Darkjinnee\Footing\Contracts
 */
interface Device
{
    /**
     * @param string $agent
     * @return mixed
     */
    public static function findByAgent(string $agent);

    /**
     * @param int $id
     * @return mixed
     */
    public static function findById(int $id);

    /**
     * @return mixed
     */
    public function token();

    /**
     * @return mixed
     */
    public function user();
}
