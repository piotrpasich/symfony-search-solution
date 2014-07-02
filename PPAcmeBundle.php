<?php

namespace PP\AcmeBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use PP\AcmeBundle\DependencyInjection\CompilerPass\QueryBuilderCompilerPass;

class PPAcmeBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new QueryBuilderCompilerPass());
    }
}
