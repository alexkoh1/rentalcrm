<?php
namespace AppBundle\ParamConverter;

use AppBundle\Entity\Bicycle;
use AppBundle\Entity\Client;
use AppBundle\Service\ClientServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: tim
 * Date: 6/1/17
 * Time: 11:51 AM
 */
class NewClientParamConverter implements ParamConverterInterface
{
    private $clientService;

    public function __construct(
        ClientServiceInterface $clientService
    )
    {
        $this->clientService = $clientService;
    }
    public function supports(ParamConverter $configuration)
    {
        return true;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $params = json_decode($request->getContent(), true);
        $clientId = $request->attributes->get('id');

        if (!$clientId) {
            $client = new Client($params['phone']);
        } else {
            $client = $this->clientService->getClient($clientId);
        }
        $client->setName($params['name'] ?? null);
        $client->setDocumentNumber($params['document_number'] ?? null);
        $client->setSurname($params['surname'] ?? null);
        $request->attributes->set('client', $client);
    }
}