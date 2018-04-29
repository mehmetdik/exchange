<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Symbol
 *
 * @ORM\Table(name="symbol")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SymbolRepository")
 */
class Symbol
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Provider", inversedBy="symbols")
     * @ORM\JoinColumn(name="provider", referencedColumnName="id")
     */
    private $provider;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Currency", inversedBy="symbols")
     * @ORM\JoinColumn(name="currency", referencedColumnName="id")
     */
    private $currency;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exchanges = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return Symbol
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
     * Set provider
     *
     * @param \AppBundle\Entity\Provider $provider
     *
     * @return Symbol
     */
    public function setProvider(Provider $provider = null)
    {
        $this->provider = $provider;
        return $this;
    }
    /**
     * Get provider
     *
     * @return \AppBundle\Entity\Provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set currency
     *
     * @param \AppBundle\Entity\Currency $currency
     *
     * @return Symbol
     */
    public function setCurrency(Currency $currency = null)
    {
        $this->currency = $currency;
        return $this;
    }
    /**
     * Get currency
     *
     * @return \AppBundle\Entity\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Add exchange
     *
     * @param \AppBundle\Entity\Exchange $exchange
     *
     * @return Symbol
     */
    public function addExchange(\AppBundle\Entity\Exchange $exchange)
    {
        $this->exchanges[] = $exchange;
        return $this;
    }
    /**
     * Remove exchange
     *
     * @param \AppBundle\Entity\Exchange $exchange
     */
    public function removeExchange(\AppBundle\Entity\Exchange $exchange)
    {
        $this->exchanges->removeElement($exchange);
    }
    /**
     * Get exchanges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExchange()
    {
        return $this->exchanges;
    }



}

