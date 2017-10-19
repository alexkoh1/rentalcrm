<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/30/17
 * Time: 6:07 PM
 */

namespace AppBundle\Service;


use Symfony\Component\HttpFoundation\Request;

interface PaymentPolicyServiceInterface
{
    public function createPaymentPolicy(Request $request);
    public function listPaymentPolicy ();
    public function getPaymentPolicy($id);
}