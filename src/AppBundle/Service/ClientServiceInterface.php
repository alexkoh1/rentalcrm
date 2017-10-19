<?php
namespace AppBundle\Service;


use AppBundle\Entity\Client;
use Symfony\Component\HttpFoundation\Request;

interface ClientServiceInterface
{
    public function createClientByPhone(string $phone);
    public function getClient($phone);
    public function createClient(Client $client);
    public function editClient(Client $client);
}