require('./bootstrap');

$(document).ready(function (){
    $('#btncomplete').on('click', function (e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            url: '/todo/complete/' + $(this).attr('data'),
            type: "POST"
        }).done(function(result){
            document.getElementById("badge").innerHTML = result.state;

            $('#badge').removeClass('badge-danger');
            $('#badge').addClass('badge-success');

            document.getElementById("btncomplete").innerHTML = "";
        });
    });

    $('#btnclose').on('click', function (e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $.ajax({
            url: '/lists/close/' + $(this).attr('data'),
            type: "POST"
        }).done(function(result){
            $('#badge').removeClass('badge-danger');
            $('#badge').addClass('badge-success');


            document.getElementById('save_create_block').innerHTML = ""
        });
    });
})
