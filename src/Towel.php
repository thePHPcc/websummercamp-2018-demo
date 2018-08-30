<?php declare(strict_types=1);

class Towel
{
    /**
     * @var Guest
     */
    private $guest;

    public function __construct(Guest $guest)
    {
        $this->guest = $guest;
    }

    public function guest(): Guest
    {
        return $this->guest;
    }
}
