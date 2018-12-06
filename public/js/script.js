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

    var [brand, model, year, available] = values();

    var data = {
        _token:CSRF_TOKEN,
        brand:brand,
        model:model,
        year:year,
        available:available
    };

    var url = "/ajax/search";

    ajaxRequest(url,data);
});

// makes ajax pagination within a search
$(document).on('click', '.pagination a',function(e){
    if($(this).attr('href').includes("ajax")){
        e.preventDefault();

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var data = {_token:CSRF_TOKEN};

        var [brand, model, year, available] = values();

        var b = "brand";
        var m = "model";
        var y = "year";

        var url ="/ajax/search?";

        var href = $(this).attr('href');

        // checks if href in pagination contains search criteria and modifies data and url accordingly
        if(href.includes(b)){
            url += "brand="+brand;
            data.brand = brand;
        }
        if(href.includes(m)){
            url += "&model="+model;
            data.model = model;
        }
        if(href.includes(y)){
            url += "&year="+year;
            data.year = year;
        }

        data.available = available;

        var page = href.split('page=')[1];

        url += "&available="+available+"&page="+page;

        ajaxRequest(url, data);
    }
});

// Makes the ajax request with received url and data
function ajaxRequest(url, data){
    $.ajax({
        url:url,
        data:data,
        success:function(response) {
            $('#car_table').html(response);
        }
    });
}

// returns array with field values
function values(){
    var brand = $('#brand').val();
    var model = $('#model').val();
    var year = $('#year').val();
    var available = 0;
    if($('#available').is(':checked')){
        var available = 1;
    }

    return [brand, model, year, available];
}

// on clicking table row, opens window to show that car
$(document).on('click', 'tr', function(){
    var id = ($(this).data('id'));
    window.location.href = "/cars/"+id;
});
