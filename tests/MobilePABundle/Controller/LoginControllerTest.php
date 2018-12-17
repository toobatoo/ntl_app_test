<?php

namespace MobilePABundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function loginIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/', array('login'=>'b', 'pass'=>'v'));

        $this->assertContains('Hello World', $client->getResponse()->getContent());
    }
}
