<?php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\Request;

/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/19/17
 * Time: 9:50 AM
 */
interface OrderServiceInterface
{
    public function createOrder(Request $request);
    public function getOrder($id);
    public function listOrders($status = 'openned');
    public function openOrder($id);
    public function closeorder($id);
}