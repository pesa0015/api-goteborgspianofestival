<?php

use App\Event;
use App\EventPage;
use App\Day;
use App\Location;
use App\Room;
use App\Pianist;

class EventsSeeder extends DatabaseSeeder
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
            $events = $this->getData('year-' . $day->year->year . '/events/day-' . $day->date . '.json');

            if (is_null($events)) {
                $this->command->warn($day->date . ' ' . Day::MONTH . ' ' . $day->year->year . ' have no events');
                continue;
            }

            $this->seedEvents($events, $day);
        }
    }

    private function seedEvents($events, $day)
    {
        foreach ($events as $event) {
            $originalEvent = clone $event;

            unset($event->location);
            unset($event->room);

            if (isset($event->pianist)) {
                $pianist = Pianist::where('slug', $event->pianist)->firstOrFail()->id;
            } else {
                $pianist = null;
            }

            $seededEvent = Event::create([
                'start'       => $event->start,
                'end'         => $event->end,
                'name'        => isset($event->name->sv) ? $event->name->sv : $event->name,
                'description' => isset($event->description->sv) ? $event->description->sv : $event->description,
                'pianist_id'  => $pianist,
            ]);

            $this->translate($seededEvent, $event);

            $location = Location::where('name', $originalEvent->location)->first();

            $room = $location->rooms()->where('name', $originalEvent->room)->first();

            $seededEvent->location()->associate($location)
                ->room()->associate($room)
                ->day()->associate($day)
                ->update();

            if (!isset($event->eventpage)) {
                continue;
            }

            $eventPage = EventPage::where('slug', $event->eventpage)->first();

            if (!$eventPage) {
                $this->command->warn('Eventpage ' . $event->eventpage . ' not found for event ' . $seededEvent->name . ' (id ' . $seededEvent->id . ')');
            }

            $seededEvent->eventPage()->associate($eventPage);
            $seededEvent->update();
        }
    }
}
