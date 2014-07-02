<?php

namespace PP\AcmeBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class QueryBuilderCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('pp_acme.post.filter.request.listener')) {
            return;
        }

        $definition = $container->getDefinition(
            'pp_acme.post.filter.request.listener'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'pp_acme.post.filter.field'
        );

        foreach ($taggedServices as $id => $attributes) {
            $definition->addMethodCall(
                'addSearchField',
                array(new Reference($id))
            );
        }
    }
}
