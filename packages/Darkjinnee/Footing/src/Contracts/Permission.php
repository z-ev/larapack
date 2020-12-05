<?php


namespace Darkjinnee\Footing\Contracts;


/**
 * Interface Permission
 * @package Darkjinnee\Footing\Contracts
 */
interface Permission
{
    /**
     * @param string $name
     * @return mixed
     */
    public static function findByName(string $name);

    /**
     * @param int $id
     * @return mixed
     */
    public static function findById(int $id);

    /**
     * @param string $name
     * @return mixed
     */
    public static function findOrCreate(string $name);

    /**
     * @return mixed
     */
    public function roles();
}
