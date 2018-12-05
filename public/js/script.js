$(document).ready(function(){

    $('.card-img-top').click(function(){

        var brand = $(this).closest('.w').children('input[name="brand"]').val();
        var model = $(this).closest('.w').children('input[name="model"]').val();
        var year = $(this).closest('.w').children('input[name="year"]').val();
        var availability= $(this).closest('.w').children('input[name="availability"]').val();
        var description = $(this).closest('.w').siblings().children().text();

        var source = $(this).attr('src');

        $('#modal').on('show.bs.modal', function(){
            var brandli = "<li><strong>Brand:</strong> "+brand+"</li>";
            var modelli = "<li><strong>Model:</strong> "+model+"</li>";
            var yearli = "<li><strong>Year:</strong> "+year+"</li>";

            if(availability == 0){
                availability = "Not available";
            } else {
                availability = "Available";
            }

            var availabilityli = "<li><strong>Availability:</strong> "+availability+"</li>";
            var full_list = brandli+ modelli+ yearli+availabilityli;

            $('#list').html(full_list);
            $('#description').text(description);
            $('#image').attr('src', source);
        });
    });    
});

$(document).on('click','#s-form', function(e){
    e.preventDefault();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var brand = $('#brand').val();
    var model = $('#model').val();
    var year = $('#year').val();
    var available = 0;
    var avail_check = $('#available');
    if(avail_check.is(':checked')){
        var available = 1;
    }

    var data = {
        _token:CSRF_TOKEN,
        brand:brand,
        model:model,
        year:year,
        available:available
    };

    $.ajax({
        url:'/ajax/search',
        data:data,
        success:function(response) {
            $('#car_table').html(response);
        }
    });
});


$(document).on('click', '.pagination a',function(e){
    if(window.location.href.includes("ajax") || $(this).attr('href').includes("ajax")){

        e.preventDefault();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        var b = "brand";
        var m = "model";
        var y = "year";

        var bValue;
        var mValue;
        var yValue;
        var available = 0;
        
        if($('#available').is(':checked')){
            var available = 1;
        }

        var destiny = $(this).attr('href');
        var page = destiny.split('page=')[1];

        var url ="/ajax/search?";
        var data = {_token:CSRF_TOKEN};

        // checks if href in pagination contains search criteria and modifies data and url accordingly
        if(destiny.includes(b)){   
            var bValue = ($('#brand').val());
            url += "brand="+bValue;
            data.brand = bValue;
        }
        if(destiny.includes(m)){   
            var mValue = ($('#model').val());
            url += "&model="+mValue;
            data.model = mValue;
        }
        if(destiny.includes(y)){   
            var yValue = ($('#year').val());
            url += "&year="+yValue;
            data.year = yValue;
        }

        data.available = available;

        url += "&available="+available+"&page="+page;

        $.ajax({
            url:url,
            data: data,
            success: function(response){
            $('#car_table').html(response);
            // console.log(response);
            }
        });
    }
});

