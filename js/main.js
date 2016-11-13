$( "#customer-from" ).on( "submit", function( event ) {
    event.preventDefault();
    var location = window.location.href;
    var data = $( this ).serialize();

    $.post(
        'getRequest.php',
        data,
        function(response){
            var answer = jQuery.parseJSON(response);

            console.log(response);

            var info_data = $('.info-data');
            var block_error = $('.for-error');
            if (answer.error !== undefined) {
                info_data.hide();
                block_error.text(answer.error);
                block_error.fadeIn(500);
                return;
            }
            block_error.hide();
            info_data.show();

            $('.contracts-added').remove();

            // Print Info about customer
            $(".name-customer").text(answer.info.name_customer);
            $(".company").text(answer.info.company);


            // Print and adding rows for contracts
            var cnt_elements = 0;
            $.each( answer.contracts, function( i ) {
                cnt_elements++;
                if (cnt_elements > 1 ) {
                    var number_tr =
                        '<tr class="contracts-added">' +
                            '<td >номер договора</td>' +
                            '<td class="contracts-number-'+cnt_elements+'"></td>' +
                         '</tr>' +
                         '<tr class="contracts-added">' +
                            '<td >дата подписания</td>' +
                            '<td class="contracts-sign-'+cnt_elements+'">[date_sign]</td>' +
                         '</tr>';

                    $('.contracts').before(number_tr);
                }
                $('.contracts-number-'+cnt_elements).text(answer.contracts[i].number);
                $('.contracts-sign-'+cnt_elements).text(answer.contracts[i].date_sign);

            });

            // Print services
            var services = '';
            $.each( answer.services, function( i ) {
                services += answer.services[i].title_service + "<br>";
            });
            $(".services-name").html(services);

        });

});



$("#customer-from .send").validation(
    $("#customer-from input[name=search]").validate({
        test: "blank digits",
        invalid: function(){
            $(this).parent('label').siblings('.help-block').show();
            $(this).parent('label').addClass('has-error');
        },
        valid: function(){
            $(this).parent('label').siblings('.help-block').hide();
            $(this).parent('label').removeClass('has-error');
        }
    })
);