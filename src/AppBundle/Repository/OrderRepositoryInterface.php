<?php
namespace AppBundle\Repository;


use AppBundle\Entity\Order;

interface OrderRepositoryInterface
{
    public function create(Order $order);
}