<?php

namespace AppBundle\Entity;

use ClassesWithParents\E;
use Doctrine\ORM\Mapping as ORM;

/**
 * Exchange
 *
 * @ORM\Table(name="exchange")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExchangeRepository")
 */
class Exchange
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Symbol", inversedBy="exchanges")
     * @ORM\JoinColumn(name="symbol", referencedColumnName="id")
     */
    private $symbol;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Exchange
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Exchange
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set symbol
     *
     * @param \AppBundle\Entity\Symbol $symbol
     *
     * @return Exchange
     */
    public function setSymbol(Symbol $symbol = null)
    {
        $this->symbol = $symbol;
        return $this;
    }
    /**
     * Get symbol
     *
     * @return \AppBundle\Entity\Symbol
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

}

