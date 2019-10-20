<?php
/**
 * Created by PhpStorm.
 * User: webfacer
 * Date: 15.01.2019
 * Time: 19:33
 */

namespace App\Model\Dto\DeliverySercice\Traits;


trait DeliveryServiceTrait
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $url;


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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }
}
