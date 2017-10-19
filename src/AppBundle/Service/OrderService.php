<?php
namespace AppBundle\Service;

use AppBundle\Entity\Bicycle;
use AppBundle\Entity\Location;
use AppBundle\Entity\Order;
use AppBundle\Repository\OrderRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class OrderService implements OrderServiceInterface
{

    private $clientService;
    private $orderRepository;
    private $entityManager;

    public function __construct(
        EntityRepository $orderRepository,
        ClientServiceInterface $clientService,
        EntityManagerInterface $entityManager
    )
    {
        $this->orderRepository = $orderRepository;
        $this->clientService   = $clientService;
        $this->entityManager = $entityManager;
    }

    public function createOrder(Request $request)
    {
        $params = json_decode($request->getContent(), true);

        $bicycle = $this->


        $client = $this->orderRepository->findOneByPhone($params['phone']);

        if (!$client) {
            $client = $this->clientService->createClientByPhone($params['phone']);
        }


        $bicycle = $this->orderRepository->findBy(['id' => $params['bicycle_id']]);

        if (count($bicycle) !== count($params['bicycle_id'])) {
            throw new Exception('hui');
        }

        $order = new Order();
        $order->setBicycle($bicycle);
        $order->setClient($client);
        $order->setHours($params['hours']);
        $order->setTimeStarted(new \DateTime('now'));
        $order->setTimeFinished(new \DateTime('+'.$params['hours'].'h'));
        $order->setOpenned(0);
        $order->setClosed(0);
        $order->setDeleted(0);
        $this->entityManager->persist($order);
        $this->entityManager->flush();
    }

    public function getOrder($id)
    {
        return $this->orderRepository->find($id);
    }

    public function listOrders($status = 'openned')
    {
        if ($status == 'openned') {
            $criteria = ['openned' => 1];
        }
        if ($status == 'closed') {
            $criteria = ['openned' => 1];
        }
        $criteria = ['openned' => 0];
        $orders = $this->orderRepository->findBy($criteria);
        return $orders;
    }

    public function openOrder($id) {
        $order = $this->getOrder($id);
        if (!$order) {
            throw new Exception('Order not found');
        }
        $order->setOpenned(1);
        $order->setTimeStarted(new \DateTime('now'));
        $this->orderRepository->flush();
    }

    public function closeOrder($id)
    {
        $order = $this->getOrder($id);
        if (!$order) {
            throw new Exception('Order not found');
        }
        $order->setClosed(1);
        $order->setTimeFinished(new \DateTime('now'));
        $this->orderRepository->flush();
    }
}