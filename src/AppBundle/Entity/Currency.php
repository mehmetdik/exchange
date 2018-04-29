<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currency
 *
 * @ORM\Table(name="currency")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CurrencyRepository")
 */
class Currency
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Symbol", mappedBy="currency")
     */
    private $symbols;


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
     * @return Currency
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
     * Constructor
     */
    public function __construct()
    {
        $this->symbols = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add symbol
     *
     * @param \AppBundle\Entity\Symbol $symbol
     *
     * @return Currency
     */
    public function addSymbol(\AppBundle\Entity\Symbol $symbol)
    {
        $this->symbols[] = $symbol;
        return $this;
    }
    /**
     * Remove symbol
     *
     * @param \AppBundle\Entity\Symbol $symbol
     */
    public function removeSymbol(\AppBundle\Entity\Symbol $symbol)
    {
        $this->symbols->removeElement($symbol);
    }
    /**
     * Get symbols
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSymbols()
    {
        return $this->symbols;
    }

}

