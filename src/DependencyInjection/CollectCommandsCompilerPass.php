<?php
/**
 * Author: Herman Slatman
 * Date: 23/08/2018
 * Time: 18:28
 */

namespace App\DependencyInjection;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class CollectCommandsCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $builder): void
    {
        $application_definition = $builder->getDefinition(Application::class);

        foreach ($builder->getDefinitions() as $name => $definition) {
            if (is_a($definition->getClass(), Command::class, true)) {
                $application_definition->addMethodCall('add', [new Reference($name)]);
            }
        }
    }
}