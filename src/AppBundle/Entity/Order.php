<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/18/17
 * Time: 4:40 PM
 */
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Bicycle;


/**
 * @ORM\Entity(repositoryClass='AppBundle\Repository\CommonRepository')
 * @ORM\Table(name="`order`")
 */
class Order extends AbstractEntity
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * var $bicycle Bicycle
     *
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Bicycle")
     * @ORM\JoinTable(name="bicycle_to_order",
     *      joinColumns={@ORM\JoinColumn(name="order_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="bicycle_id", referencedColumnName="id")}
     *      )
     */
    private $bicycle;
    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
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
     * @Assert\Type(
     *     type = "integer",
     * )
     * @ORM\Column(type="integer", length=4)
     */
    private $hours;
    /**
     * @ORM\Column(type="boolean")
     */
    private $deleted;

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
    public function getBicycle()
    {
        return $this->bicycle;
    }

    /**
     * @param mixed $bicycle
     */
    public function setBicycle($bicycle)
    {
        $this->bicycle = $bicycle;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getTimeStarted()
    {
        return $this->timeStarted;
    }

    /**
     * @param mixed $timeStarted
     */
    public function setTimeStarted($timeStarted)
    {
        $this->timeStarted = $timeStarted;
    }

    /**
     * @return mixed
     */
    public function getTimeFinished()
    {
        return $this->timeFinished;
    }

    /**
     * @param mixed $timeFinished
     */
    public function setTimeFinished($timeFinished)
    {
        $this->timeFinished = $timeFinished;
    }

    /**
     * @return mixed
     */
    public function getOpenned()
    {
        return $this->openned;
    }

    /**
     * @param mixed $openned
     */
    public function setOpenned($openned)
    {
        $this->openned = $openned;
    }

    /**
     * @return mixed
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * @param mixed $closed
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    }

    /**
     * @return mixed
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param mixed $hours
     */
    public function setHours($hours)
    {
        $this->hours = $hours;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }
}
