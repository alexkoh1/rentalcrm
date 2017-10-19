<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/18/17
 * Time: 5:15 PM
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Constraint as CustomAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommonRepository")
 * @ORM\Table(name="bicycle")
 */
class Bicycle extends AbstractEntity
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
     * @ORM\JoinColumn(name="payment_id", referencedColumnName="id")
     * @Assert\NotBlank
     * @CustomAssert\EntityExist(className="AppBundle\Entity\Bicycle")
     */
    private $paymentPolicy;
    /**
     * @ORM\ManyToOne(targetEntity="Location")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")
     */
    private $location;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * @param mixed $colour
     */
    public function setColour($colour)
    {
        $this->colour = $colour;
    }

    /**
     * @return mixed
     */
    public function getPaymentPolicy()
    {
        return $this->paymentPolicy;
    }

    /**
     * @param mixed $paymentPolicy
     */
    public function setPaymentPolicy($paymentPolicy)
    {
        $this->paymentPolicy = $paymentPolicy;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }
}