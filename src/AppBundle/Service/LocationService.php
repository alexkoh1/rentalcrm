<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/30/17
 * Time: 5:56 PM
 */

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class LocationService implements LocationServiceInterface
{
    private $em;

    public function __construct(
        EntityManagerInterface $em
    )
    {
        $this->em = $em;
    }

    public function createLocation(Request $request)
    {
        // TODO: Implement createLocation() method.
    }

    public function listLocation()
    {

    }
    public function getLocation($id)
    {
        return $this->em->getRepository('AppBundle:Location')->requiredById($id);
    }
}