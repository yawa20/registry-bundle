<?php
/**
 * @author: Andrii yakovlev <yawa20@gmail.com>
 * @since: 22.02.18
 */

namespace Yawa20\RegistryBundle\Registry;

use Yawa20\RegistryBundle\Exception\InvalidInterfaceRegistryException;
use Yawa20\RegistryBundle\Exception\KeyNotFoundRegistryException;
use Yawa20\RegistryBundle\Registrable\RegistrableInterface;

interface RegistryInterface
{
    /**
     * @param RegistrableInterface $item
     * @throws InvalidInterfaceRegistryException
     * @return void
     */
    public function add(RegistrableInterface $item): void;

    /**
     * @param string $key
     * @throws KeyNotFoundRegistryException
     * @return RegistrableInterface
     */
    public function get(string $key): RegistrableInterface;

    /**
     * @return array
     */
    public function all(): array;

    /**
     * @return string[]
     */
    public function getKeys(): array;

    /**
     * @param string $key
     * @return bool
     */
    public function exists(string $key): bool;
}

