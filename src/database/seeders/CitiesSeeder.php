<?php

namespace Database\Seeders;

ini_set('memory_limit', '-1');

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $json = Storage::disk('public')->get('json/city.list.json');
            $data = json_decode($json);

            foreach ($data as $obj) {
                City::create([
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'state' => $obj->state,
                    'country' => $obj->country,
                    'lon' => $obj->coord->lon,
                    'lat' => $obj->coord->lat
                ]);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
