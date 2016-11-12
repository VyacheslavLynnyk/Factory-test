
console.log('main js');
// $('#customer-from .send').on('click', function(){
//     console.log($( this ).parent('form').serialize());
//     var host = window.location.host;
//     $.post(
//         'http://' + host + '/getRequest.php',
//         $( this ).serialize(),
//         function(response){
//             console.log(response);
//         });
//
// });


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