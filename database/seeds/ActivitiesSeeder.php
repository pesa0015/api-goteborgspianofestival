<?php

use App\Activity;
use App\Day;
use App\Location;
use App\Room;

class ActivitiesSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = Day::all();

        foreach ($days as $day) {
            $activities = $this->getData('year-' . $day->year->year . '/activities/day-' . $day->date . '.json');

            $this->seedActivities($activities, $day);
        }
    }

    private function seedActivities($activities, $day)
    {
        foreach ($activities as $activity) {
            $originalActivity = clone $activity;

            unset($activity->location);
            unset($activity->room);

            $seededActivity = Activity::create((array)$activity);

            $location = Location::where('name', $originalActivity->location)->first();

            $room = $location->rooms()->where('name', $originalActivity->room)->first();

            $seededActivity->location()->associate($location)
                ->room()->associate($room)
                ->day()->associate($day)
                ->update();
        }
    }
}
