$(document).ready(function () {

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    //Event of Button Save
    $('#btn_submit').click(function () {

        var name = $("#name").val();
        var price = $("#price").val();

//                var frm = $(this).closest('form.upl');
//                var frm_data = new FormData(frm[0]);

        var token = $("meta[name='csrf-token']").attr("content");

        var status = $("#id").val();

        // Update
        if(status){

            $.ajax({
                url: "/phone/"+status,
                type: "PUT",
                data: {
                    _token: token,
                    name: name,
                    price: price
                },
                cache: false,

                success: function(dataResult){

                    var dataResult = JSON.parse(dataResult);

                    alert(dataResult.message);

                }
            });


        // Insert
        }else{
            $.ajax({
                url: "/phone",
                type: "POST",
                data: {
                    _token: $("#csrf").val(),
                    name: name,
                    price: price
                },
                cache: false,

                success: function(dataResult){

                    var dataResult = JSON.parse(dataResult);

                    alert(dataResult.message);

                }
            });
        }
    });
});