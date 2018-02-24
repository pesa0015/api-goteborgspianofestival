<?php

use App\Location;
use App\Year;

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
            $years = $location->years;

            unset($location->years);

            $seededLocation = Location::create((array)$location);

            foreach ($years as $locationYear) {
                $year = Year::where('year', $locationYear->year)->first();

                $year->locations()->save($seededLocation);
            }
        }
    }
}
