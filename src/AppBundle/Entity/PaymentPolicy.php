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
 * @ORM\Entity
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
}