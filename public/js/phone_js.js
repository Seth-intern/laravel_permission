
$(document).ready(function () {

    var active_key = -1;
    var id = 0;
    //Event of Button Save
    $('#btn_submit').click(function () {



        var body = $('body');
        var name = $("#name");
        var price = $("#price");

        if(name.val() == ''){
            name.focus();
            return;
        }else if(price.val() == ''){
            price.focus();
            return;
        }

        var token = $("meta[name='csrf-token']").attr("content");

        // Update
        if(id != 0){
            $.ajax({
                url: "/phone/"+id,
                type: "PUT",
                data: {
                    _token: token,
                    name: name.val(),
                    price: price.val()
                },

                cache: false,

                success: function(dataResult){

                    var data = JSON.parse(dataResult);

                    var tr = "<tr><td>"+data.key+"</td><td>"+name.val()+"</td><td>$ "+price.val()+"</td><td><div class='row'><button class='editRecord btn btn-primary' id='btn_edit' data-id="+data.key+" >Edit</button><button class='deleteRecord btn btn-danger' id='btn_delete' data-id="+data.key+" >Delete Record</button></div></td></tr>";

                    //var y = body.find("table tbody tr").length;

                    body.find("table tbody tr:eq("+active_key+")").remove();

                    if(active_key == 0){
                        body.find("table tbody").before(tr);
                    }else{
                        body.find("table tbody tr:eq("+(active_key-1)+")").after(tr);
                    }

                    alert(data.message);

                    active_key = -1;

                    name.val('');
                    price.val('');

                    return;

                }
            });


        // Insert
        }else{
            $.ajax({
                url: "/phone",
                type: "POST",
                data: {
                    _token: token,
                    name: name.val(),
                    price: price.val()
                },
                cache: false,

                success: function(dataResult){
                    var data = JSON.parse(dataResult);

                    //alert(data.key);

                    var tr = "<tr><td>"+data.key+"</td><td>"+name.val()+"</td><td>$ "+price.val()+"</td><td><div class='row'><button class='editRecord btn btn-primary' id='btn_edit' data-id="+data.key+" >Edit</button><button class='deleteRecord btn btn-danger' id='btn_delete' data-id="+data.key+" >Delete Record</button></div></td></tr>";

                    //var y = body.find("table tbody tr").length;

                    body.find("table tbody tr:eq(0)").before(tr);

                    alert(data.message);

                }
            });
        }
    });

    // Event of Button Edit
    $('body').on('click', '#btn_edit', function () {
        var This = $(this);
        var token = $("meta[name='csrf-token']").attr("content");
        id = This.data("id");

        var name = $("#name");
        var price = $("#price");
        $.ajax(
            {
                url: "phone/"+id+"/edit",
                type: 'GET',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (data){
                    var data = JSON.parse(data);
                    name.val(data.name);
                    price.val(data.price);
                    active_key = This.parents('tr').index();
                }
            });
    });

    // Event of Button Delete
    $('body').on('click', '#btn_delete', function () {
        var This = $(this);
        var id = This.data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
            {
                url: "phone/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){
                    This.parents('tr').remove();
                }
            });
    });

    // Event of Button Clear
    $('body').on('click', '#btn_clear', function () {
       active_key = -1;
       id = 0;
       $("#name").val('');
       $("#price").val('');
        $("#name").focus();
    });
});
