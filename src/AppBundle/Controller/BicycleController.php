<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/30/17
 * Time: 5:22 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Bicycle;
use AppBundle\Entity\Location;
use AppBundle\Entity\PaymentPolicy;
use AppBundle\Service\BicycleServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\Bic;

class BicycleController
{
    private $bicycleService;
    public function __construct(
        BicycleServiceInterface $bicycleService,
        Serializer $serializer
    )
    {
        $this->bicycleService = $bicycleService;
        $this->serializer = $serializer;
    }

    /**
     * @ParamConverter("bicycle", class="AppBundle:Bicycle", converter="new_bicycle_param_converter")
     * @ParamConverter("location", class="AppBundle:Location", converter="exist_location_param_converter")
     * @ParamConverter("paymentPolicy", class="AppBundle:PaymentPolicy", converter="exist_payment_policy_param_converter")
     */
    public function createAction(Bicycle $bicycle, Location $location, PaymentPolicy $paymentPolicy)
    {
        $this->bicycleService->createBicycle($bicycle, $location, $paymentPolicy);
    }


    /**
     * @ParamConverter("bicycle", class="AppBundle:Bicycle", converter="new_bicycle_param_converter")
     * @ParamConverter("location", class="AppBundle:Location", converter="exist_location_param_converter")
     * @ParamConverter("paymentPolicy", class="AppBundle:PaymentPolicy", converter="exist_payment_policy_param_converter")
     */
    public function editAction(Bicycle $bicycle, Location $location, PaymentPolicy $paymentPolicy)
    {
        $this->bicycleService->editBicycle($bicycle, $location, $paymentPolicy);
    }

    public function listAction() {
        $result = $this->bicycleService->listBicycle();
        $response = new Response($this->serializer->serialize($result, 'json'));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}