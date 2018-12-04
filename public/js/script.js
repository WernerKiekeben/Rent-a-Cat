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