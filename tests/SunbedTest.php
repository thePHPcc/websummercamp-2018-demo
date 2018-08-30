<?php declare(strict_types=1);

class SunbedTest extends PHPUnit\Framework\TestCase
{
    public function testInitiallyIsNotReserved()
    {
        $sunbed = new Sunbed;

        $this->assertFalse($sunbed->isReserved());
    }

    public function testInitiallyIsNotOccupied()
    {
        $sunbed = new Sunbed;

        $this->assertFalse($sunbed->isOccupied());
    }

    public function testCanBeReservedWithATowel()
    {
        $guest = new Guest;
        $towel = new Towel($guest);
        $sunbed = new Sunbed;
        $sunbed->reserveWith($towel);

        $this->assertTrue($sunbed->isReserved());
    }

    public function testCanBeOccupiedByGuest()
    {
        $guest = new Guest;
        $sunbed = new Sunbed;
        $sunbed->occupyBy($guest);

        $this->assertTrue($sunbed->isOccupied());
    }

    public function testGuestWhoReservedSunbedCanOccupyIt()
    {
        $guest = new Guest;
        $towel = new Towel($guest);
        $sunbed = new Sunbed;

        $sunbed->reserveWith($towel);
        $sunbed->occupyBy($guest);

        $this->assertTrue($sunbed->isOccupied());
    }

    public function testCannotBeOccpiedByOtherGuest()
    {
        $guest = new Guest;
        $otherGuest = new Guest;
        $towel = new Towel($otherGuest);
        $sunbed = new Sunbed;

        $sunbed->reserveWith($towel);

        $this->expectException(TowelException::class);

        $sunbed->occupyBy($guest);
    }

    public function testCannotBeReservedTwice()
    {
        $guest = new Guest;
        $towel = new Towel($guest);
        $sunbed = new Sunbed;

        $sunbed->reserveWith($towel);

        $this->expectException(TowelException::class);

        $sunbed->reserveWith(new Towel(new Guest));
    }
}
