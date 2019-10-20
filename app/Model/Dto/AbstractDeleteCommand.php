<?php


namespace App\Model\Dto;


use App\Model\AbstractModel;
use App\Model\Traits\GetAttributesTrait;

abstract class AbstractDeleteCommand extends AbstractModel
{

    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $dateFormat
     */
    protected $dateFormat = 'Y-m-d H:i:s';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
}
