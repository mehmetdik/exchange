<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provider
 *
 * @ORM\Table(name="provider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProviderRepository")
 */
class Provider
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="wrapper", type="string", length=255, options={"default" : null})
     */
    private $wrapper;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Symbol", mappedBy="provider")
     */
    private $symbols;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->symbols = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set url
     *
     * @param string $url
     *
     * @return Provider
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Provider
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set wrapper
     *
     * @param string $wrapper
     *
     * @return Provider
     */
    public function setWrapper($wrapper)
    {
        $this->wrapper = $wrapper;

        return $this;
    }

    /**
     * Get wrapper
     *
     * @return string
     */
    public function getWrapper()
    {
        return $this->wrapper;
    }



    /**
     * Add symbol
     *
     * @param \AppBundle\Entity\Symbol $symbol
     *
     * @return Provider
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

