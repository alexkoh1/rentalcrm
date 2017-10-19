<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/30/17
 * Time: 4:00 PM
 */

namespace AppBundle\Service;


use AppBundle\Entity\Bicycle;
use AppBundle\Entity\Location;
use AppBundle\Entity\PaymentPolicy;
use AppBundle\Repository\CommonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class BicycleService implements BicycleServiceInterface
{
    private $bicycleRepository;
    private $locationService;
    private $paymentPolicyService;

    public function __construct(
        CommonRepository $bicycleRepository,
        LocationServiceInterface $locationService,
        PaymentPolicyService $paymentPolicyService
    )
    {
        $this->bicycleRepository = $bicycleRepository;
        $this->locationService = $locationService;
        $this->paymentPolicyService = $paymentPolicyService;
    }
    public function createBicycle(Bicycle $bicycle, Location $location, PaymentPolicy $paymentPolicy)
    {
        $bicycle->setLocation($location);
        $bicycle->setPaymentPolicy($paymentPolicy);
        $this->bicycleRepository->save($bicycle);
    }
    public function getBicycle($id)
    {
        return $this->bicycleRepository->requiredById($id);
    }
    public function editBicycle(Bicycle $bicycle, Location $location, PaymentPolicy $paymentPolicy)
    {
        $bicycle->setLocation($location);
        $bicycle->setPaymentPolicy($paymentPolicy);
        $this->bicycleRepository->save($bicycle);
    }

    public function listBicycle()
    {
        return $this->bicycleRepository->findAll();
    }
}