<?php
namespace Transmission\Bundle\TransmissionBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Transmission\Bundle\TransmissionBundle\DependencyInjection\TransmissionExtension;

/**
 * @author Ramon Kleiss <ramonkleiss@gmail.com>
 */
class TransmissionExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldLoadServiceDefinition()
    {
        $container = new ContainerBuilder();
        $extension = new TransmissionExtension();
        $extension->load(array(), $container);

        $this->assertTrue($container->hasDefinition('transmission'));
        $this->assertEquals('localhost', $container->getParameter('transmission.host'));
        $this->assertEquals(9091, $container->getParameter('transmission.port'));
        $this->assertEquals(null, $container->getParameter('transmission.path'));
        $this->assertEquals(null, $container->getParameter('transmission.username'));
        $this->assertEquals(null, $container->getParameter('transmission.password'));
        $this->assertEquals('Transmission\Transmission', $container->getParameter('transmission.class'));
        $this->assertEquals('Transmission\Client', $container->getParameter('transmission.client.class'));
    }
}
