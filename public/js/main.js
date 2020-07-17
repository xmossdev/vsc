
function search(id){    
    $.ajax({
        url: '/getWeather/'+ id +'/'+ $('input[name=units]:checked').attr('id'),
        type: 'GET',
    })
    .done(function(data){
        $('#details').hide('slow');
        $('#details').html(data);
        $('#search').blur();
        $('#details').show('slow');                
    });    
    $("#autocompletList").empty();
}


$('#details').hide();

$('#search').on('input',function(e){

    if($('#search').val().trim()!=''){
        $.ajax({
            url: '/autocompletCityName/'+$('#search').val().trim(),
            type: 'GET',
        })
        .done(function(data){
            $("#autocompletList").empty();
            $.each(data,function(key,value){
                $("#autocompletList").append('<li class="list-group-item text-secondary" id="'+value['id']+'">'+value['name']+'</li>');
                $("#"+value['id']).mousedown(function(){
                    $('#search').val($("#"+value['id']).html());
                    search($("#"+value['id']).attr('id'));
                });
            })            
        });
    }
});

$('#search').blur(function(){
    $("#autocompletList").empty();
});

$('#search').click(function(){
    $('#search').val('');
});

$(document).on('keypress',function(e){
    if(e.which == 13){         
        if($('#autocompletList li').first().attr('id')!=undefined){     
            $('#search').val($('#autocompletList li').first().html());
            search( $('#autocompletList li').first().attr('id') );
        }
    }
});