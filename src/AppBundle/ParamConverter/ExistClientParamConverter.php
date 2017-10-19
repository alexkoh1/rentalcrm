<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 6/1/17
 * Time: 4:20 PM
 */

namespace AppBundle\ParamConverter;


use AppBundle\Entity\Client;
use AppBundle\Service\ClientServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class ExistClientParamConverter implements ParamConverterInterface
{
    private $ClientService;
    public function __construct(ClientServiceInterface $ClientService)
    {
        $this->ClientService = $ClientService;
    }

    public function supports(ParamConverter $configuration)
    {
        return true;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $params = json_decode($request->getContent(), true);

        $Client = $this->ClientService->getClient($params['client_id']);
        $request->attributes->set('client', $Client);
    }
}