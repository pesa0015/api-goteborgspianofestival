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
        PianistsSeeder::class,
        EventPagesSeeder::class,
        EventsSeeder::class,
        NewsSeeder::class,
        BoardMembersSeeder::class,
        SponsorsSeeder::class
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

    protected function translate($model, $jsonData)
    {
        $translations = $this->keyExists((array)$jsonData);

        if (!empty($translations)) {
            $class = get_class($model);
            foreach ($translations as $translate) {
                $field = $translate['key'];

                foreach ($translate['lang'] as $translation) {
                    $translate = (array)$translation;
                    
                    $model->translations()->create([
                        'translateable_id'   => $model->id,
                        'translateable_type' => $class,
                        'key'                => $field,
                        'language'           => key($translate),
                        'translation'        => array_shift($translate)
                    ]);
                }
            }
        }
    }

    private function keyExists(array $arr)
    {
        $translations = [];

        foreach ($arr as $key => $element) {
            if (isset($element->translations)) {
                $translate = [
                    'key'  => $key,
                    'lang' => (array)$element->translations->lang
                ];

                array_push($translations, $translate);
            }
        }

        return $translations;
    }
}
