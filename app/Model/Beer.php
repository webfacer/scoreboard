<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Character
 * @package App\Model
 */
class Beer extends AbstractModel
{
    protected $table = 'beers';

    /**
     * Get the comments for the blog post.
     */
    public function locations()
    {
        return $this->belongsToMany(Location::class, 'beer_location', 'beer_id');
    }
}
