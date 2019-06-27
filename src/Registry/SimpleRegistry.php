<?php
/**
 * @author: Andrii yakovlev <yawa20@gmail.com>
 * @since: 22.02.18
 */

namespace Yawa20\RegistryBundle\Registry;

use Yawa20\RegistryBundle\Exception\InvalidInterfaceRegistryException;
use Yawa20\RegistryBundle\Exception\KeyNotFoundRegistryException;
use Yawa20\RegistryBundle\Registrable\RegistrableInterface;

/**
 * Class SimpleRegistry
 * @package AppBundle\Registry
 */
class SimpleRegistry implements RegistryInterface
{
    /** @var string */
    private $interface;

    /** @var RegistrableInterface[] */
    private $items = [];

    /**
     * SimpleRegistry constructor.
     * @param string $interface
     */
    public function __construct(string $interface = RegistrableInterface::class)
    {
        $this->interface = $interface;
    }

    /**
     * {@inheritdoc}
     */
    public function add(RegistrableInterface $item): void
    {
        if (!($item instanceof $this->interface)) {
            throw new InvalidInterfaceRegistryException("trying to register invalid interface");
        }
        $this->items[$item->getKey()] = $item;
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $key): RegistrableInterface
    {
        if (!array_key_exists($key, $this->items)) {
            throw new KeyNotFoundRegistryException("key {$key} not found in registry");
        }

        return $this->items[$key];
    }

    /**
     * {@inheritdoc}
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * {@inheritdoc}
     */
    public function getKeys(): array
    {
        return array_keys($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function exists(string $key): bool
    {
        return array_key_exists($key, $this->items);
    }
}
