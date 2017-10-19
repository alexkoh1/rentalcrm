<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 6/1/17
 * Time: 4:20 PM
 */

namespace AppBundle\ParamConverter;


use AppBundle\Entity\Location;
use AppBundle\Service\LocationServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class ExistLocationParamConverter implements ParamConverterInterface
{
    private $locationService;
    public function __construct(LocationServiceInterface $locationService)
    {
        $this->locationService = $locationService;
    }

    public function supports(ParamConverter $configuration)
    {
        return true;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $params = json_decode($request->getContent(), true);
        $location = $this->locationService->getLocation($params['location_id']);
        $request->attributes->set('location', $location);
    }
}