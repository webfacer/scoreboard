<?php


namespace App\Model\Dto\Location\Traits;


use App\Model\Traits\GetAttributesTrait;

trait LocationTrait
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var integer
     */
    protected $delivery_service_id;
    /**
     * @var boolean
     */
    protected $delivery_enabled;
    /**
     * @var float
     */
    protected $latitude;
    /**
     * @var float
     */
    protected $longitude;
    /**
     * @var integer
     */
    protected $phone_number;
    /**
     * @var integer
     */
    protected $mobile_number;
    /**
     * @var \DateTime
     */
    protected $shop_hours;
    /**
     * @var \DateTime
     */
    protected $delivery_hours;


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
     * @return int
     */
    public function getDeliveryServiceId(): int
    {
        return $this->delivery_service_id;
    }

    /**
     * @param int $delivery_service_id
     */
    public function setDeliveryServiceId(int $delivery_service_id)
    {
        $this->delivery_service_id = $delivery_service_id;
    }

    /**
     * @return bool
     */
    public function isDeliveryEnabled(): bool
    {
        return $this->delivery_enabled;
    }

    /**
     * @param bool $delivery_enabled
     */
    public function setDeliveryEnabled(bool $delivery_enabled)
    {
        $this->delivery_enabled = $delivery_enabled;
    }

    /**
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return int
     */
    public function getPhoneNumber(): int
    {
        return $this->phone_number;
    }

    /**
     * @param int $phone_number
     */
    public function setPhoneNumber(int $phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return int
     */
    public function getMobileNumber(): int
    {
        return $this->mobile_number;
    }

    /**
     * @param int $mobile_number
     */
    public function setMobileNumber(int $mobile_number)
    {
        $this->mobile_number = $mobile_number;
    }

    /**
     * @return \DateTime
     */
    public function getShopHours(): \DateTime
    {
        return $this->shop_hours;
    }

    /**
     * @param \DateTime $shop_hours
     */
    public function setShopHours(\DateTime $shop_hours)
    {
        $this->shop_hours = $shop_hours;
    }

    /**
     * @return \DateTime
     */
    public function getDeliveryHours(): \DateTime
    {
        return $this->delivery_hours;
    }

    /**
     * @param \DateTime $delivery_hours
     */
    public function setDeliveryHours(\DateTime $delivery_hours)
    {
        $this->delivery_hours = $delivery_hours;
    }
}
