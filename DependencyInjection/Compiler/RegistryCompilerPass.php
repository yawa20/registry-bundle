<?php
/**
 * @author: Andrii yakovlev <yawa20@gmail.com>
 * @since: 22.02.18
 */

namespace Yawa20\RegistryBundle\DependencyInjection\Compiler;

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Yawa20\RegistryBundle\Registry\RegistryInterface;

/**
 * Class ModulesCompilerPass
 * @package AppBundle\DependencyInjection\Compiler
 */
class RegistryCompilerPass implements CompilerPassInterface
{
    const REGISTRY_TAG = 'app.registry';
    const REGISTRY_ITEM_TAG = 'app.registry.item';

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $registryItems = $container->findTaggedServiceIds(self::REGISTRY_ITEM_TAG);
        foreach ($registryItems as $itemName => $tagList) {
            $item = $container->getDefinition($itemName);
            foreach ($tagList as $tag) {
                if (!$container->hasDefinition($tag['registry'])) {
                    throw new ServiceNotFoundException("Registry ".$tag['registry']." not defined");
                }
                $registry = $container->getDefinition($tag['registry']);
                if (!in_array(RegistryInterface::class, class_implements($registry->getClass()))) {
                    $message = $registry->getClass()." is not instance of ".RegistryInterface::class;
                    throw new InvalidConfigurationException($message);
                }
                $registry->addMethodCall('add', [$item]);
            }
        }
    }
}

