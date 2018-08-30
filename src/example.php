<?php

class Something
{
    public function findGuestById(GuestId $guestId): Guest
    {
        // ...
    }
}

class GuestId
{
    /**
     * @var int
     */
    private $id;

    public function __construct(int $guestId)
    {
        if ($guestId <= 0) {
            throw new OutOfBoundsException;
        }

        $this->id = $guestId;
    }

    public function asInt(): int
    {
        return $this->id;
    }
}
