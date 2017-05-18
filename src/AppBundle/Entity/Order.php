<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/18/17
 * Time: 4:40 PM
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order")
 */
class Order
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Bicycle")
     * @ORM\JoinTable(name="bicycle_to_order",
     *      joinColumns={@ORM\JoinColumn(name="bicycle_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="order_id")}
     *      )
     */
    private $bicycle;
    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="id")
     */
    private $client;
    /**
     * @ORM\Column(type="datetime")
     */
    private $timeStarted;
    /**
     * @ORM\Column(type="datetime")
     */
    private $timeFinished;
    /**
     * @ORM\Column(type="boolean")
     */
    private $openned;
    /**
     * @ORM\Column(type="boolean")
     */
    private $closed;
    /**
     * @ORM\Column(type="integer", length=4)
     */
    private $hours;
    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;
}
