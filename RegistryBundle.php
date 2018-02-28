<?php
/**
 * @author: Andrii yakovlev <yawa20@gmail.com>
 * @since: 28.02.18
 */

namespace Yawa20\RegistryBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Yawa20\RegistryBundle\DependencyInjection\Compiler\RegistryCompilerPass;

/**
 * Class RegistryBundle
 */
class RegistryBundle extends Bundle
{
    public function build(ContainerBuilder $builder)
    {
        $builder->addCompilerPass(new RegistryCompilerPass());
    }
}

