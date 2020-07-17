<?php

use Illuminate\Database\Seeder;
use App\CityList;

class CityListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = storage_path() . "/city.list.json";
        $json = File::get($path);
        $json = json_decode($json);
        foreach ($json as $data) {
        	CityList::create(array(
        		'name' 		=> $data->name,
        		'state' 	=> $data->state,
        		'country' 	=> $data->country,
        		'lon' 		=> $data->coord->lon,
        		'lat' 		=> $data->coord->lat
        	));
        }
    }
}
