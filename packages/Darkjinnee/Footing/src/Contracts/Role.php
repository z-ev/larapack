<?php


namespace Darkjinnee\Footing\Contracts;


/**
 * Interface Role
 * @package Darkjinnee\Footing\Contracts
 */
interface Role
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
    public function permissions();
}
