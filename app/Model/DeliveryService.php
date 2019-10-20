<?php

namespace App\Model;


class DeliveryService extends AbstractModel
{
    /**
     * @var string $table
     */
    protected $table = 'delivery_services';

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'location_deliveryservice', 'delivery_service_id');
    }
}
