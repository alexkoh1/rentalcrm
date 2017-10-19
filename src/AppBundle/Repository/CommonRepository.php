<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/31/17
 * Time: 12:16 PM
 */

namespace AppBundle\Repository;


use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;

class CommonRepository extends EntityRepository
{
    public function requiredById($id) {
        $commonObject = $this->find($id);
        if (!$commonObject) {
            throw new EntityNotFoundException('Object not found');
        }
        return $commonObject;
    }

    public function save($commonObject = null) {
        if (!$commonObject) {
            $this->getEntityManager()->flush();
        } else {
            $this->getEntityManager()->persist($commonObject);
            $this->getEntityManager()->flush();
        }
    }
}