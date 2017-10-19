<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/18/17
 * Time: 5:12 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommonRepository")
 * @ORM\Table(name="payment_policy")
 */
class PaymentPolicy
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $policyName;
    /**
     * @ORM\Column(type="integer")
     */
    private $firstHour;
    /**
     * @ORM\Column(type="integer")
     */
    private $nextHour;
    /**
     * @ORM\Column(type="integer")
     */
    private $max_hour;
    /**
     * @ORM\Column(type="integer")
     */
    private $day;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPolicyName()
    {
        return $this->policyName;
    }

    /**
     * @param mixed $policyName
     */
    public function setPolicyName($policyName)
    {
        $this->policyName = $policyName;
    }

    /**
     * @return mixed
     */
    public function getFirstHour()
    {
        return $this->firstHour;
    }

    /**
     * @param mixed $firstHour
     */
    public function setFirstHour($firstHour)
    {
        $this->firstHour = $firstHour;
    }

    /**
     * @return mixed
     */
    public function getNextHour()
    {
        return $this->nextHour;
    }

    /**
     * @param mixed $nextHour
     */
    public function setNextHour($nextHour)
    {
        $this->nextHour = $nextHour;
    }

    /**
     * @return mixed
     */
    public function getMaxHour()
    {
        return $this->max_hour;
    }

    /**
     * @param mixed $max_hour
     */
    public function setMaxHour($max_hour)
    {
        $this->max_hour = $max_hour;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }
}