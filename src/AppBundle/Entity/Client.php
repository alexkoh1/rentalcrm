<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 5/18/17
 * Time: 5:47 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client
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
     * @ORM\Column(type="string", length=100)
     */
    private $surname;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $phone;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $DocumentNumber;
}