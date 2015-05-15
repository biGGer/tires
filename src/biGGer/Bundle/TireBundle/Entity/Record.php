<?php

namespace biGGer\Bundle\TireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Record
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Record
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="date")
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="date")
     */
    private $dateEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="passport", type="string", length=255)
     */
    private $passport;

    /**
     * @var string
     *
     * @ORM\Column(name="passport_given", type="string", length=255)
     */
    private $passportGiven;

    /**
     * @var date
     *
     * @ORM\Column(name="passport_date", type="date")
     */
    private $passportDate;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer", type="string", length=255)
     */
    private $manufacturer;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="size", type="string", length=255)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="rack", type="integer")
     */
    private $rack;

    /**
     * @var string
     *
     * @ORM\Column(name="assembly", type="string", length=255)
     */
    private $assembly;

    /**
     * @var integer
     *
    * @ORM\Column(name="shelf", type="integer")
     */
    private $shelf;

    /**
     * @var integer
     *
     * @ORM\Column(name="cell", type="integer")
     */
    private $cell;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     * @return Record
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime 
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return Record
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Record
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
     * Set passport
     *
     * @param string $passport
     * @return Record
     */
    public function setPassport($passport)
    {
        $this->passport = $passport;

        return $this;
    }

    /**
     * Get passport
     *
     * @return string 
     */
    public function getPassport()
    {
        return $this->passport;
    }

    /**
     * Set passportGiven
     *
     * @param string $passportGiven
     * @return Record
     */
    public function setPassportGiven($passportGiven)
    {
        $this->passportGiven = $passportGiven;

        return $this;
    }

    /**
     * Get passportGiven
     *
     * @return string 
     */
    public function getPassportGiven()
    {
        return $this->passportGiven;
    }

    /**
     * Set passportDate
     *
     * @param \DateTime $passportDate
     * @return Record
     */
    public function setPassportDate($passportDate)
    {
        $this->passportDate = $passportDate;

        return $this;
    }

    /**
     * Get passportDate
     *
     * @return \DateTime 
     */
    public function getPassportDate()
    {
        return $this->passportDate;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return Record
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set manufacturer
     *
     * @param string $manufacturer
     * @return Record
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string 
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Record
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return Record
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set rack
     *
     * @param integer $rack
     * @return Record
     */
    public function setRack($rack)
    {
        $this->rack = $rack;

        return $this;
    }

    /**
     * Get rack
     *
     * @return integer 
     */
    public function getRack()
    {
        return $this->rack;
    }

    public function setAssembly($assembly)
    {
        $this->assembly = $assembly;

        return $this;
    }

    public function getAssembly()
    {
        return $this->assembly;
    }

    /**
     * Set shelf
     *
     * @param integer $shelf
     * @return Record
     */
    public function setShelf($shelf)
    {
        $this->shelf = $shelf;

        return $this;
    }

    /**
     * Get shelf
     *
     * @return integer 
     */
    public function getShelf()
    {
        return $this->shelf;
    }

    /**
     * Set cell
     *
     * @param integer $cell
     * @return Record
     */
    public function setCell($cell)
    {
        $this->cell = $cell;

        return $this;
    }

    /**
     * Get cell
     *
     * @return integer 
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return Record
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Record
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
     * Set status
     *
     * @param string $status
     * @return Record
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Record
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
}
