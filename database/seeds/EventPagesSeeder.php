<?php

use App\EventPage;
use App\EventPagePianist;
use App\Year;
use App\Pianist;

class EventPagesSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = Year::all();

        foreach ($years as $year) {
            $eventPages = $this->getData('year-' . $year->year . '/eventpages.json');

            if (is_null($eventPages)) {
                $this->command->warn($year->year . ' has no event pages');
                continue;
            }

            foreach ($eventPages as $eventPage) {
                $event = $this->getData('year-' . $year->year . '/eventpages/' . $eventPage . '.json');
                $this->seedEventPage($event, $year);
            }
        }
    }

    private function seedEventPage($eventPage, $year)
    {
        $seededPage = EventPage::create([
            'title'       => isset($eventPage->title->sv) ? $eventPage->title->sv : $eventPage->title,
            'description' => isset($eventPage->description->sv) ? $eventPage->description->sv : $eventPage->description,
            'slug'        => $eventPage->slug,
            'img'         => null,
            'year_id'     => $year->id
        ]);

        if (isset($eventPage->pianists)) {
            foreach ($eventPage->pianists as $eventPianist) {
                $pianist = Pianist::where('slug', $eventPianist->slug)->firstOrFail();

                EventPagePianist::create([
                    'event_page_id' => $seededPage->id,
                    'pianist_id'    => $pianist->id,
                    'bio'           => isset($eventPianist->bio) ? $eventPianist->bio : null,
                    'img'           => isset($eventPianist->img) ? $eventPianist->img : null
                ]);
            }
        }
        
        $this->translate($seededPage, $eventPage);
    }
}
