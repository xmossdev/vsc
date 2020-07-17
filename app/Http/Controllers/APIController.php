<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\CityList;
use App\RestAPI;

class APIController extends Controller
{

    private $APIurl = 'https://api.openweathermap.org';
    private $endpoint = 'data/2.5/onecall';
    private $APIkey = 'd99774d0568f5109e5724bc567242db5';

    private $suggestCount = 5; //ilosc wyswietlanych podpowiedzi miast

    public function getUnits($units){        
        switch ($units) {
            case 'metric':
                return array(
                    'temp' => 'C',
                    'wind' => 'm/s'
                );
                break;
            case 'imperial':
                return array(
                    'temp' => 'F',
                    'wind' => 'mi/s'
                );
                break;            
            default:
                return array(
                    'temp' => 'K',
                    'wind' => 'm/s'
                );
                break;
        }
    }

    public function autocompletCityName($s){    	
		$cityList = CityList::where('name', 'like',$s.'%')->limit($this->suggestCount)->get();
        return $cityList;    	
    }

    public function getCharData($response){
        $charData = [];
        for($i=0;$i<5;$i++){
            $data = [];
            $data['label'] = date('Y-m-d',$response->daily[$i]->dt);
            $data['y'] = $response->daily[$i]->temp->day;
            array_push($charData,$data);
        }
        return json_encode($charData);
    }

    public function getWeather($id,$units){
        $city = CityList::where('id',$id)->first();
        $cityName = $city->name;
        
        $api = new RestAPI($this->APIurl);
        $api->setEndpoint($this->endpoint);

        $parameters = array(
            'exclude' => 'current,minutely,hourly',
            'appid' => $this->APIkey,
            'lon'   => $city->lon,
            'lat'   => $city->lat,            
            'lang'  => 'pl',
            'units' => $units,
        );

        $api->setParameters($parameters);
        $response = $api->doRequest();
        $response = json_decode($response);

        if(isset($response->cod)){
            return view('error');
        }
        
        $charData = $this->getCharData($response);
        $units = json_encode($this->getUnits($units));
        return view('details',compact('response','cityName','charData','units'));
    }

}