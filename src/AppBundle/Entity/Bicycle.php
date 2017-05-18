<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/18/17
 * Time: 5:15 PM
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bicycle")
 */
class Bicycle
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
    private $name;
    /**
     * @ORM\Column(type="integer")
     */
    private $cost;
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $colour;
    /**
     * @ORM\ManyToOne(targetEntity="PaymentPolicy")
     * @ORM\JoinColumn(name="id")
     */
    private $paymentPolicy;
    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="id")
     */
    private $location;
}