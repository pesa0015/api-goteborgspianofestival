<?php

use App\Sponsor;

class SponsorsSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = $this->getData('sponsors.json');

        $this->seedSponsors($sponsors);
    }

    private function seedSponsors($sponsors)
    {
        foreach ($sponsors as $sponsor) {
            Sponsor::create((array)$sponsor);
        }
    }
}
