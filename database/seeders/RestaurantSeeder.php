<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use App\Models\Location;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(__DIR__.'/../../storage/app/Trip_Advisor_Data.csv', 'r');
        $csv = fread($file, filesize(__DIR__.'/../../storage/app/Trip_Advisor_Data.csv'));
        fclose($file);

        $lines = explode(PHP_EOL, $csv);
        $header = collect(str_getcsv(array_shift($lines)));
        $rows = collect($lines);
        $rows->pop();
        $rows->forget(5969);
        $rows->forget(5968);

        $data = $rows->map(fn ($row) => $header->combine(str_getcsv($row)));

        $locations = [];
        $cuisines = [];
        $cuisine_restaurant = [];
        foreach ($data as $key => $value) {
            array_push($locations, $value['Location']);
            foreach (explode(', ', $value['Cuisine']) as $cuisine) {
                array_push($cuisines, $cuisine);
                array_push($cuisine_restaurant, ['restaurant' => $value['Name'], 'cuisine' => $cuisine]);
            }
        }
        $locations = array_unique($locations);
        $cuisines = array_unique($cuisines);

        // Seed Locations Table
        foreach ($locations as $value) {
            $location = new Location;
            $location->name = $value;
            $location->save();
        }

        // Seed Cuisines Table
        foreach ($cuisines as $value) {
            $cuisine = new Cuisine;
            $cuisine->name = $value;
            $cuisine->save();
        }

        // Seed Restaurants Table
        foreach ($data as $value) {
            $restaurant = new Restaurant;
            $restaurant->location()->associate(Location::where('name', $value['Location'])->first());
            // Location::where('name', $value['Location'])->first()->restaurant()->associate($restaurant);
            $restaurant->url = $value['Url'];
            $restaurant->name = $value['Name'];
            $restaurant->address = $value['Address'];
            $restaurant->number = $value['Number'];
            // $restaurant->timings = $value['Timings'];
            $restaurant->save();
        }

        // Seed Cuisine_Restaurant Table
        foreach ($cuisine_restaurant as $value) {
            $pivot = [Restaurant::where('name', $value['restaurant'])->first(), Cuisine::where('name', $value['cuisine'])->first()];
            $pivot[0]->cuisines()->attach($pivot[1]->id);
        }
    }
}
