$( "#customer-from" ).on( "submit", function( event ) {
    event.preventDefault();
    var location = window.location.href;
    var data = $( this ).serialize();
    console.log( data );
    $.post(
        'getRequest.php',
        data,
        function(response){
            $('.info-data').html(response);
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