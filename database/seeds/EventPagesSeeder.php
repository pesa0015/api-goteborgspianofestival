<?php

use App\EventPage;
use App\Year;

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
        
        $this->translate($seededPage, $eventPage);
    }
}
