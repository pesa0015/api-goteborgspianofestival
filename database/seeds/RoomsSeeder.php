<?php

use App\Room;
use App\Location;

class RoomsSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = $this->getData('rooms.json');

        $this->seedRooms($rooms);
    }

    private function seedRooms($rooms)
    {
        foreach ($rooms as $room) {
            $location = Location::where('name', $room->location)->first();

            unset($room->location);

            $seededRoom = Room::create((array)$room);

            $seededRoom->location()->associate($location)->update();
        }
    }
}
