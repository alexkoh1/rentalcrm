<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 6/1/17
 * Time: 4:20 PM
 */

namespace AppBundle\ParamConverter;


use AppBundle\Entity\Location;
use AppBundle\Entity\PaymentPolicy;
use AppBundle\Service\LocationServiceInterface;
use AppBundle\Service\PaymentPolicyServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;

class NewPaymentPolicyParamConverter implements ParamConverterInterface
{
    private $PaymentPolicy;
    public function __construct(PaymentPolicyServiceInterface $paymentPolicyService)
    {
        $this->PaymentPolicy = $paymentPolicyService;
    }

    public function supports(ParamConverter $configuration)
    {
        return true;
    }

    public function apply(Request $request, ParamConverter $configuration)
    {
        $params = json_decode($request->getContent(), true);
        $paymentPolicy = new PaymentPolicy();
        $paymentPolicy->setDay($params['day']);
        $paymentPolicy->setFirstHour($params['first_hour']);
        $paymentPolicy->setNextHour($params['next_hour']);
        $paymentPolicy->setDay($params['day']);
        $paymentPolicy->setPolicyName($params['policy_name']);
        $request->attributes->set('paymentPolicy', $paymentPolicy);
    }
}