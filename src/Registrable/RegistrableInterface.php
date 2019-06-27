<?php
/**
 * @author: Andrii yakovlev <yawa20@gmail.com>
 * @since: 22.02.18
 */

namespace Yawa20\RegistryBundle\Registrable;

/**
 * Interface RegistrableInterface
 * @package Yawa20\RegistryBundle\Registrable
 */
interface RegistrableInterface
{
    /**
     * @return string
     */
    public function getKey(): string;
}
