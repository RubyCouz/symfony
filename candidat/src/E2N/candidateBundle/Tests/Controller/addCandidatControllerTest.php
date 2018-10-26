<?php

namespace E2N\candidateBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class addCandidatControllerTest extends WebTestCase
{
    public function testAddcandidat()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajout-candidat');
    }

}
