<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/30/17
 * Time: 6:08 PM
 */

namespace AppBundle\Service;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PaymentPolicyService implements PaymentPolicyServiceInterface
{

    private $em;
    public function __construct(
        EntityManagerInterface $em
    )
    {
        $this->em = $em;
    }

    public function listPaymentPolicy()
    {
        // TODO: Implement listPaymentPolicy() method.
    }
    public function createPaymentPolicy(Request $request)
    {
        // TODO: Implement createPaymentPolicy() method.
    }
    public function getPaymentPolicy($id)
    {
        return $this->em->getRepository('AppBundle:PaymentPolicy')->requiredById($id);
    }
}