

function create_modulo(){
    $.ajax({
        type: "POST",
        url: '/modulo/register',
        data: {data:$("#modulo-register").serializeObject()},
        success: function(response)
        {
            if(response.object == "success"){
                alert(response.message);
            }
            // var col =   {"modified_by":'last_name',
            //                 "created_by":'last_name'
            //             };
            // var final = acomodarData(response.data,col);
            // $('#dturl').DataTable({
            //     data:final,
            //     columns:acomodarcol(response.data),
            //     select:true,
            //     "scrollX": true,
            //     "paging":false
            // });
        }
    });
}
get_modulo();
function get_modulo(){
    $.ajax({
        type: "POST",
        url: '/modulo/get',
        data: {},
        success: function(response)
        {

            var col =   {"modified_by":'last_name',
                            "created_by":'last_name'
                        };
            var final = acomodarData(response.data,col);
            $('#table-modulo').DataTable({
                data:final,
                columns:acomodarcol(response.data),
                "scrollX": true,
            });
        }
    });
}
