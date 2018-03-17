<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $databasePath;

    private $seeds = [
        YearsSeeder::class,
        DaysSeeder::class,
        LocationsSeeder::class,
        RoomsSeeder::class,
        ActivitiesSeeder::class
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->databasePath = database_path();
        
        foreach ($this->seeds as $seed) {
            $this->call($seed);
        }
    }

    protected function getData($fileName)
    {
        $this->databasePath = database_path();
        
        $file = $this->databasePath . '/seeds/data/' . $fileName;

        if (!File::exists($file)) {
            $this->command->warn('File ' . $fileName . ' does not exist, couldn\'t seed');
            return null;
        }

        $json = json_decode(file_get_contents($file));

        return $json;
    }
}
