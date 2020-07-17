<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class RestAPI extends Model
{
 
    protected $apiUrl;
    protected $endpoint = null;
    protected $parameters = null;
    protected $options = null;
    protected $data = null;

    public function __construct($apiUrl){    	
    	$this->apiUrl = $apiUrl;
    }

    public function setEndpoint($endpoint){
    	$this->endpoint = $endpoint;
    }

    public function setParameters(array $parameters){
    	$this->parameters = $parameters;
    }

    private function createFinalUrl(){
    	$url  = $this->apiUrl;
    	if($this->endpoint!=null){
	    	$url .= '/';
	    	$url .= $this->endpoint;    		
    	}
    	$i = 0;
    	if($this->parameters != null){
	    	foreach ($this->parameters as $key => $value) {
	    		($i == 0) ? $url .= '?' : $url .= '&';
	    		$url .= $key .'='.$value;
	    		$i++;
	    	}	
    	}
    	return $url;
    }

    public function setOptions(array $options = null){    	
		$default =  array(
            "method" => "GET",
        );
		if($options != null){
			$options = array_merge($default,$options);	
		}else{
			$options = $default;
		}		
        $this->options = $options;
    }

    public function doRequest(){
    	if($this->options == null){
    		$this->setOptions();
    	}
    	$url = $this->createFinalUrl();
    	switch($this->options['method']){
    		case "GET":
    			if($this->data == null){
    				$response = Http::get($url); 
    			}else{
    				$response = Http::get($url,$this->data); 
    			}
    			break;
    		case "POST":
    			if($this->data == null){
    				$response = Http::post($url); 
    			}else{
    				$response = Http::post($url,$this->data); 
    			}
    			break;
    		default:
    			if($this->data == null){
    				$response = Http::get($url); 
    			}else{
    				$response = Http::get($url,$this->data); 
    			}
    	}
    	return $response;
    }


}
