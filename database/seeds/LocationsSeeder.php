<?php

use App\Location;

class LocationsSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = $this->getData('locations.json');

        $this->seedLocations($locations);
    }

    private function seedLocations($locations)
    {
        foreach ($locations as $location) {
            Location::create((array)$location);
        }
    }
}
