<?php
namespace AppBundle\Controller;

use AppBundle\Service\OrderServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class OrderController
{
    private $orderService;
    private $serializer;

    public function __construct(
        OrderServiceInterface $orderService,
        Serializer $serializer
    )
    {
        $this->orderService = $orderService;
        $this->serializer = $serializer;

    }

    public function createAction(Request $request)
    {
        $this->orderService->createOrder($request);
    }

    public function getAction($id)
    {
        $result = $this->orderService->getOrder($id);
        $response = new Response($this->serializer->serialize($result, 'json'));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function listAction(Request $request)
    {
        $orders = $this->orderService->listOrders();

        $response = new Response($this->serializer->serialize($orders, 'json'));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function openAction($id){
        $result = $this->orderService->openOrder($id);
    }

    public function closeAction($id) {
        $result = $this->orderService->closeOrder($id);
    }


}