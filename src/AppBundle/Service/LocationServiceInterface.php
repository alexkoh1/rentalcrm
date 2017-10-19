<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/30/17
 * Time: 5:45 PM
 */

namespace AppBundle\Service;


use Symfony\Component\HttpFoundation\Request;

interface LocationServiceInterface
{
    public function createLocation(Request $request);
    public function listLocation();
    public function getLocation($id);
}