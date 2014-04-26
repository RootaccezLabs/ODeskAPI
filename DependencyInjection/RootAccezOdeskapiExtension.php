<?php

namespace RootAccez\OdeskapiBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class RootAccezOdeskapiExtension extends Extension {

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        

        foreach (array('key', 'secret') as $attribute) {
            if (isset($config[$attribute])) {
                $container->setParameter('rootaccez_odeskapi.'.$attribute, $config[$attribute]);
            }
        }
    }

}
