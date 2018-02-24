<?php

use App\Year;
use App\Day;

class YearsSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = $this->getData('years.json');

        $this->seedYears($years);
    }

    private function seedYears($years)
    {
        foreach ($years as $year) {
            Year::create((array)$year);
        }
    }
}
