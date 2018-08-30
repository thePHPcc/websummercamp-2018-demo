<?php declare(strict_types=1);

class Sunbed
{
    /**
     * @var Towel
     */
    private $towel;

    /**
     * @var Guest
     */
    private $guest;

    public function reserveWith(Towel $towel): void
    {
        $this->ensureNotReserved();

        $this->towel = $towel;
    }

    public function isReserved(): bool
    {
        return $this->towel !== null;
    }

    public function occupyBy(Guest $guest): void
    {
        if ($this->isReserved()) {
            $this->ensureSameGuestHasReserved($guest);
        }

        $this->guest = $guest;
    }

    public function isOccupied(): bool
    {
        return $this->guest !== null;
    }

    private function ensureSameGuestHasReserved($guest)
    {
        if ($this->towel->guest() !== $guest) {
            throw new TowelException;
        }
    }

    private function ensureNotReserved()
    {
        if ($this->isReserved()) {
            throw new TowelException;
        }
    }
}
