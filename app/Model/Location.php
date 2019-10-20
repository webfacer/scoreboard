<?php

namespace App\Model;

/**
 * Class Game
 * @package App\Model
 */
class Location extends AbstractModel
{
    /**
     * @var string $table
     */
    protected $table = 'locations';

    /**
     * Get the comments for the blog post.
     */
    public function beers()
    {
        return $this->belongsToMany(Beer::class, 'beer_location', 'location_id');
    }

    public function deliveryServices()
    {
        return $this->belongsToMany(DeliveryService::class, 'location_deliveryservice', 'location_id');
    }
}
