<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 23.07.18
 * Time: 13:40
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends    WebTestCase
{
    public function testIndex()
    {
        $client=self::createClient();
        $crawler = $client->request('GET', '/');
        self::assertEquals(2, $crawler->filter('h1')->count());
    }
    public function testPage()
    {
        $client=self::createClient();
        $crawler = $client->request('GET', '/page/Js');
        self::assertEquals(200, $client->getResponse()->getStatusCode());
        self::assertEquals(3,  $crawler->filter('h2')->count());
    }
}