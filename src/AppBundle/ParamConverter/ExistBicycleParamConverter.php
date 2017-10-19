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
class ExistBicycleParamConverter implements ParamConverterInterface
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
        $bicycle = [];
        foreach ($params['bicycle_id'] as $bicycleId) {
                $bicycle[]=$this->bicycleService->getBicycle($bicycleId);
        }
        $request->attributes->set('bicycle', $bicycle);
    }
}