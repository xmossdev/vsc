<div class="col-md-10 p-2 mt-3 border rounded">            
    <div class="container p-4">
        <div class="row">
            <div class="col">
                <ul class="list-group">                	
                    <li class="list-group-item">Pogoda dla <span class="font-weight-bold">{{$cityName}}</span></li>
                    <li class="list-group-item">
                    	<span class="font-weight-bold">
                    	@php
                    	echo date('Y-m-d',$response->daily[0]->dt);
                    	echo ", wschód słońca ";
                    	echo date('H:i:s',$response->daily[0]->sunrise);
                    	@endphp
                    	</span>
                    </li>
                    <li class="list-group-item">Temperatura: 
                    	<span class="font-weight-bold">
                    		{{ $response->daily[0]->temp->day }}&deg;{{ json_decode($units)->temp }}
                    	</span>
                    </li>
                    <li class="list-group-item">
                    	Wiatr: 
                    	<span class="font-weight-bold">
	                    	{{ $response->daily[0]->wind_speed }} {{ json_decode($units)->wind }}
                    	</span>
                    	<br>
                    	Kierunek:
                    	<span class="font-weight-bold">
	                    	@if($response->daily[0]->wind_deg < 22.5 and $response->daily[0]->wind_deg > 337.5)
								N
							@elseif($response->daily[0]->wind_deg >= 22.5 and $response->daily[0]->wind_deg < 67.5)
								NE
							@elseif($response->daily[0]->wind_deg >= 67.5 and $response->daily[0]->wind_deg < 112.5)
								E
							@elseif($response->daily[0]->wind_deg >= 112.5 and $response->daily[0]->wind_deg < 157.5)
								SE
							@elseif($response->daily[0]->wind_deg >= 157.5 and $response->daily[0]->wind_deg < 202.5)
								S
							@elseif($response->daily[0]->wind_deg >= 202.5 and $response->daily[0]->wind_deg < 247.5)
								SW
							@elseif($response->daily[0]->wind_deg >= 247.5 and $response->daily[0]->wind_deg < 292.5)
								W
							@elseif($response->daily[0]->wind_deg >= 292.5 and $response->daily[0]->wind_deg < 337.5)
								NW
	                    	@endif
	                    	[{{$response->daily[0]->wind_deg}}&deg;]
	                    </span>
                    </li>
                </ul>                        
            </div>
            <div class="col-8 border rounded">
                <div id="chartContainer" class="m-2" style="height: 370px;"></div>

                <div class="mt-5 m-2">
	                Średnia temperatura:
	                <span class="font-weight-bold">
	                @php
	                	$tempSum = 0;
	                	$data = json_decode($charData,JSON_UNESCAPED_SLASHES);
	                	for($i=0;$i<count($data);$i++){
	                		$tempSum+=$data[$i]['y'];
	                	}
	                	echo $tempSum/count($data);
	                @endphp
	                &deg;{{ json_decode($units)->temp }}
	                </span>
                </div>
            </div>
        </div>                
    </div>
</div>

<script type="text/javascript">
	var dataPoints = JSON.parse( @php echo json_encode($charData,JSON_UNESCAPED_SLASHES); @endphp );
</script>
<script type="text/javascript" src="{{ asset('js/chart.js') }}"></script>
