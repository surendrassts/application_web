var US = {};
US.UTIL ={
activedeactivate: function(url,id,status,ele){
    $.ajax({
        type:"POST",
        url: url,
        data: {"id":id,"status":status},
        success: function(data){
            alert(data);
            if(data == '0'){
                ele.html('Inactive');
            }
            if(data == '1'){
                ele.html('Active');
            }
        }
    });
}
}

var GC = {};
GC.UTIL ={
getcities: function(url,state_id){
    $('#e_loc_city').empty();
    $.ajax({
        type:"POST",
        url : url,
        datatype: 'json',
        data: {"state_id":state_id},
        success: function(data){
            if((data.length)!=0){
                $.each(data,function(key,city)
                {
                    var opt = $("<option></option>");
                    $('#e_loc_city').append(opt.attr("value",city.id).text(city.city_name));
                });
            }else{
                var opt = $('<option/>');
                opt.text('No Cities for this state');
                $('#e_loc_city').append(opt);
            }
        }
    });
}
}


var GE = {};
GE.UTIL ={
getcities: function(url,state_id){
    alert(url);
    $('#e_city').empty();
    $.ajax({
        type:"POST",
        url : url,
        datatype: 'json',
        data: {"state_id":state_id},
        success: function(data){
            if((data.length)!=0){
                $.each(data,function(key,city)
                {
                    var opt = $("<option></option>");
                    $('#e_city').append(opt.attr("value",city.id).text(city.city_name));
                });
            }else{
                var opt = $('<option/>');
                opt.text('No Cities for this state');
                $('#e_city').append(opt);
            }
        }
    });
    
 
}
}



   