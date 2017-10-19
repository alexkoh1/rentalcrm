<?php
namespace AppBundle\ParamConverter;

use AppBundle\Entity\Bicycle;
use AppBundle\Service\BicycleServiceInterface;
use AppBundle\Service\LocationServiceInterface;
use AppBundle\Service\PaymentPolicyService;
use AppBundle\Service\PaymentPolicyServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: tim
 * Date: 6/1/17
 * Time: 11:51 AM
 */
class NewBicycleParamConverter implements ParamConverterInterface
{
    private $bicycleService;

    public function __construct(
        BicycleServiceInterface $bicycleService
    )
    {
        $this->bicycleService = $bicycleService;
    }
    public function supports(ParamConverter $configuration)
    {
        return true;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $params = json_decode($request->getContent(), true);
        $bicycleId = $request->attributes->get('id');
        if (!$bicycleId) {
            $bicycle = new Bicycle();
        } else {
            $bicycle=$this->bicycleService->getBicycle($bicycleId);
        }
        $bicycle->setCost($params['cost']);
        $bicycle->setColour($params['colour']);
        $bicycle->setName($params['name']);
        $request->attributes->set('bicycle', $bicycle);
    }
}