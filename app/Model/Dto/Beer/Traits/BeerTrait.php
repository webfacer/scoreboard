<?php

namespace App\Model\Dto\Beer\Traits;


trait BeerTrait
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var boolean
     */
    protected $approved;

    /**
     * @var string
     */
    protected $place;

    /**
     * @var integer
     */
    protected $user_id;

    /**
     * @var integer
     */
    protected $brewed_by_id;

    /**
     * @var string
     */
    #protected $style;

    /**
     * @var string
     */
    protected $barcode;

    /**
     * @var integer
     */
    protected $per_mille;

    /**
     * @var integer
     */
    protected $alcohol_by_volume;

    /**
     * @var integer
     */
    protected $international_bitterness_unit;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->approved;
    }

    /**
     * @param bool $approved
     */
    public function setApproved(bool $approved)
    {
        $this->approved = $approved;
    }

    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace(string $place)
    {
        $this->place = $place;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return int
     */
    public function getBrewedById(): int
    {
        return $this->brewed_by_id;
    }

    /**
     * @param int $brewed_by_id
     */
    public function setBrewedById(int $brewed_by_id)
    {
        $this->brewed_by_id = $brewed_by_id;
    }

    /**
     * @return string
     */
    public function getBarcode(): string
    {
        return $this->barcode;
    }

    /**
     * @param string $barcode
     */
    public function setBarcode(string $barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return int
     */
    public function getPerMille(): int
    {
        return $this->per_mille;
    }

    /**
     * @param int $per_mille
     */
    public function setPerMille(int $per_mille)
    {
        $this->per_mille = $per_mille;
    }

    /**
     * @return int
     */
    public function getAlcoholByVolume(): int
    {
        return $this->alcohol_by_volume;
    }

    /**
     * @param int $alcohol_by_volume
     */
    public function setAlcoholByVolume(int $alcohol_by_volume)
    {
        $this->alcohol_by_volume = $alcohol_by_volume;
    }

    /**
     * @return int
     */
    public function getInternationalBitternessUnit(): int
    {
        return $this->international_bitterness_unit;
    }

    /**
     * @param int $international_bitterness_unit
     */
    public function setInternationalBitternessUnit(int $international_bitterness_unit)
    {
        $this->international_bitterness_unit = $international_bitterness_unit;
    }

    /**
     * @return string|null
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
}
