<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/25/17
 * Time: 5:02 PM
 */

namespace AppBundle\Service;


use AppBundle\Entity\Bicycle;
use AppBundle\Entity\Location;
use AppBundle\Entity\PaymentPolicy;

interface BicycleServiceInterface
{
    public function createBicycle(Bicycle $bicycle, Location $location, PaymentPolicy $paymentPolicy);
    public function getBicycle($id);
    public function editBicycle(Bicycle $bicycle, Location $location, PaymentPolicy $paymentPolicy);
    public function listBicycle();
}