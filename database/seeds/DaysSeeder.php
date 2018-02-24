<?php

use App\Day;
use App\Year;

class DaysSeeder extends DatabaseSeeder
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
            $days = $this->getData('year-' . $year->year . '/days.json');

            $this->seedDays($days, $year);
        }
    }

    private function seedDays($days, $year)
    {
        foreach ($days as $day) {
            $seededDay = Day::create((array)$day);

            $seededDay->year()->associate($year);
            $seededDay->update();
        }
    }
}
