<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TWOJA POGODA!</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Noto Sans TC', sans-serif;
            }
        </style>
</head>
<body class="bg-white">
          

<div class="w-100 bg-success border-bottom border-danger pb-2">    
    <div class="container">

        <div class="row">
            <div class="col-md-10 mt-5">
                <h1 class="display-4 font-weight-bold">TWOJA POGODA!</h1>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-10 mt-5">                
                <div class="input-group md-form form-sm form-1 pl-0">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-search"></i>
                    </span>
                    </div>                    
                    <input class="form-control my-0 py-1" type="text" placeholder="Wpisz miasto" id="search">                   
                </div>
                
                <div class="float-right mt-2 ml-2">
                    <span class="mr-2 font-weight-bold">Jednostki:</span> 
                    <div class="form-check form-check-inline mr-2">
                        <input class="form-check-input" type="radio" name="units" id="si" value="option1">
                        <label class="form-check-label" for="si">SI</label>
                    </div>
                    <div class="form-check form-check-inline mr-2">
                        <input class="form-check-input" type="radio" checked name="units" id="metric" value="option2">
                        <label class="form-check-label" for="metric">Metryczne</label>
                    </div>
                    <div class="form-check form-check-inline mr-2">
                        <input class="form-check-input" type="radio" name="units" id="imperial" value="option3" >
                        <label class="form-check-label" for="imperial">Imperialne</label>
                    </div>
                </div>
                <ul class="list-group position-absolute w-50" style="z-index: 10000" id="autocompletList">
                </ul>
            </div>
        </div>      

    </div>    
</div>

<div class="w-100">
    <div class="container">
        <div class="row justify-content-md-center" id="details">                 
        </div>         
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>


<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>
</html>