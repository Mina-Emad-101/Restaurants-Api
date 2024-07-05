<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(__DIR__.'../../storage/app/Trip_Advisor_Data.csv', 'r');
        $csv = fread($file, filesize(__DIR__.'../../storage/app/Trip_Advisor_Data.csv'));
        fclose($file);

        $lines = explode(PHP_EOL, $csv);
        $header = collect(str_getcsv(array_shift($lines)));
        $rows = collect($lines);

        $data = $rows->map(fn ($row) => $header->combine(str_getcsv($row)));

        $locations = [];
        $cuisines = [];
        foreach ($data as $value) {
            array_push($locations, $value['Location']);
            foreach (explode(', ', $value['Cuisines']) as $value) {
                array_push($cuisines, $value);
            }
        }
        $locations = array_unique($locations);
        $cuisines = array_unique($cuisines);

        foreach ($locations as $value) {
            $location = new Location;
        }
    }
}
