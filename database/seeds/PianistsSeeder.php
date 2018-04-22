<?php

use App\Pianist;

class PianistsSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = array_diff(scandir(database_path() . '/seeds/data/pianists'), ['.', '..']);
        
        foreach ($files as $key => $file) {
            $pianist = $this->getData('/pianists/' . $file);

            $seededPianist = Pianist::create([
                'name' => $pianist->name,
                'slug' => str_replace('.json', '', $file),
                'bio'  => isset($pianist->bio->sv) ? $pianist->bio->sv : $pianist->bio,
                'img'  => $pianist->img
            ]);

            $this->translate($seededPianist, $pianist);
        }
    }
}
