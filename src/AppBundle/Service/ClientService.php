<?php
namespace AppBundle\Service;


use AppBundle\Entity\Client;
use AppBundle\Repository\CommonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class ClientService implements ClientServiceInterface
{
    private $clientRepository;

    public function __construct(
        CommonRepository $clientRepository
    )
    {
        $this->clientRepository = $clientRepository;
    }

    public function createClientByPhone(string $phone)
    {
        $client = new Client($phone);
        $this->clientRepository->persist($client);
        $this->clientRepository->flush();
        return $client;
    }

    public function getClient($id)
    {
        return $this->clientRepository->requiredById($id);
    }

    public function createClient(Client $client) {
        if ($this->clientRepository->findByPhone($client->getPhone())) {
            throw new Exception('Client with such phone is already exist');
        }
        $this->clientRepository->save($client);
    }

    public function editClient(Client $client) {
        $params = json_decode($request->getContent(), 'true');
        $client = $this->clientRepository->getRepository('AppBundle:Client')->find($id);
        if (!$client) {
            throw new Exception('Client not found');
        }
        $client->setPhone($params['phone']);
        $client->setName($params['name']);
        $client->setSurname($params['surname']);
        $client->setDocumentNumber($params['document_number']);
        $this->clientRepository->flush();
    }
}