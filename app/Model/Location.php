<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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
}
