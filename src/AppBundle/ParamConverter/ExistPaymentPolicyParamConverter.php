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

class ExistPaymentPolicyParamConverter implements ParamConverterInterface
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
        $paymentPolicy = $this->PaymentPolicy->getPaymentPolicy($params['payment_policy_id']);
        $request->attributes->set('paymentPolicy', $paymentPolicy);
    }
}