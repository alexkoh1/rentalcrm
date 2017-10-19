<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/30/17
 * Time: 2:05 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Client;
use AppBundle\Service\ClientServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ClientController
{
    private $clientService;

    public function __construct(
        ClientServiceInterface $clientService
    )
    {
        $this->clientService = $clientService;
    }

    /**
     * @param Client $client
     *
     * @ParamConverter("client", class="AppBundle:Client", converter="new_client_param_converter")
     */
    public function createAction(Client $client)
    {
        $this->clientService->createClient($client);
    }

    /**
    * @ParamConverter("client", class="AppBundle:Client", converter="new_client_param_converter")
     */
    public function editAction(Client $client) {
        $this->clientService->editClient($client);
    }
}