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
    $.ajax({
        type:"POST",
        url : url,
        datatype: 'json',
        data: {"state_id":state_id},
        success: function(data){
           $.each(data,function(id,city_name) //here we're doing a foeach loop round each city with id as the key and city as the value
                    {
                        var opt = $('<option />'); // here we're creating a new select option with for each city
                        opt.val(id.id);
                        opt.text(city_name.city_name);
                        $('#e_loc_city').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                    });
           
        }
    });
}
}




   