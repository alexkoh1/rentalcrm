<?php
namespace AppBundle\Repository;


use AppBundle\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class OrderRepository implements OrderRepositoryInterface
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function create(Order $order)
    {

    }



}