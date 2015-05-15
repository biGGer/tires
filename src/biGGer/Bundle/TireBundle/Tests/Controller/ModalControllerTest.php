<?php

namespace biGGer\Bundle\TireBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ModalControllerTest extends WebTestCase
{
    public function testContract()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/contract');
    }

    public function testActin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/actIn');
    }

    public function testActout()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/actOut');
    }

    public function testStickers()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/stickers');
    }

}
