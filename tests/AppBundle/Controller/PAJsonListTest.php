<?php
namespace Tests\AppBundle\Controller;

use AppBundle\services\Pa\PaJsonList;
use PHPUnit\Framework\TestCase;

class PAJsonsListTest extends TestCase
{
    public function testInit( )
    {
        $kernel = static::createKernel();
        $kernel->boot();

        self::$container = $kernel->getContainer();

        $paJsonList = self::$container->get('pa_json_list');

        self::$container->get('doctrine')->getManager('PA')->getRepository('PaBundle:LigneJson');
        $list_id_pa = $repository->listIdByLineDate( 'N01', '15/05/2017' );
        $result = $paJsonList->init( $list_id_pa, 'N01', '15/05/2017' );
        $this->assertTrue( $result );
    }
}