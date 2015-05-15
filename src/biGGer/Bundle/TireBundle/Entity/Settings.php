<?php

namespace biGGer\Bundle\TireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Settings
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Settings
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="keeper", type="string", length=255)
     */
    private $keeper;

    /**
     * @var string
     *
     * @ORM\Column(name="inn", type="string", length=255)
     */
    private $inn;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="addon1", type="string", length=255)
     */
    private $addon1;

    /**
     * @var string
     *
     * @ORM\Column(name="addon2", type="string", length=255)
     */
    private $addon2;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set keeper
     *
     * @param string $keeper
     * @return settings
     */
    public function setKeeper($keeper)
    {
        $this->keeper = $keeper;

        return $this;
    }

    /**
     * Get keeper
     *
     * @return string 
     */
    public function getKeeper()
    {
        return $this->keeper;
    }

    /**
     * Set inn
     *
     * @param string $inn
     * @return settings
     */
    public function setInn($inn)
    {
        $this->inn = $inn;

        return $this;
    }

    /**
     * Get inn
     *
     * @return string 
     */
    public function getInn()
    {
        return $this->inn;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return settings
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return settings
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return settings
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set addon1
     *
     * @param string $addon1
     * @return settings
     */
    public function setAddon1($addon1)
    {
        $this->addon1 = $addon1;

        return $this;
    }

    /**
     * Get addon1
     *
     * @return string 
     */
    public function getAddon1()
    {
        return $this->addon1;
    }

    /**
     * Set addon2
     *
     * @param string $addon2
     * @return settings
     */
    public function setAddon2($addon2)
    {
        $this->addon2 = $addon2;

        return $this;
    }

    /**
     * Get addon2
     *
     * @return string 
     */
    public function getAddon2()
    {
        return $this->addon2;
    }
}
