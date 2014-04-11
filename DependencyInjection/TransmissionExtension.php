<?php

namespace Transmission\Bundle\TransmissionBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Definition;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class TransmissionExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter('transmission.class', 'Transmission\Bundle\TransmissionBundle\Service\TransmissionService');
        $container->setParameter('my_mailer.transport', 'sendmail');

        $container->setDefinition('transmission', new Definition(
            '%transmission.class%',
            array($config['host'],$config['port'])
        ));
    }
}
