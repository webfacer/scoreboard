<?php


namespace App\Model\Traits;


trait GetAttributesTrait
{
    public function getAttributes()
    {
        return get_object_vars($this);
    }
}
