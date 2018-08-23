<?php
/**
 * Author: Herman Slatman
 * Date: 23/08/2018
 * Time: 18:14
 */

namespace App;

use App\DependencyInjection\CollectCommandsCompilerPass;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class AppKernel extends Kernel
{
    /**
     * In more complex app, add bundles here
     */
    public function registerBundles(): array
    {
        return [];
    }

    /**
     * Load all services
     */
    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(__DIR__ . '/../config/services.yml');
    }

    protected function build(ContainerBuilder $builder): void
    {
        $builder->addCompilerPass(new CollectCommandsCompilerPass());
    }

    public function getCacheDir()
    {
        return dirname(__DIR__).'/var/'.$this->environment.'/cache';
    }

    public function getLogDir()
    {
        return dirname(__DIR__).'/var/'.$this->environment.'/logs';
    }
}