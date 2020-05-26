function create_permissions(){
    $.ajax({
        type: "POST",
        url: '/user/permissons/register',
        data: {data:$("#permissions-register").serializeObject()},
        success: function(response)
        {
            console.log(response);

       }
   });

}

get_permissions();
function get_permissions()
{
    $.ajax({
        type: "POST",
        url: '/user/permissons/get',
        data: {},
        success: function(response)
        {
            var col =   {"modified_by":'last_name',
            "created_by":'last_name',
            "id_modulos":"name"
        };
        var final = acomodarData(response.data,col);
        $('#table-permissions').DataTable({
        data:final,
        columns:acomodarcol(response.data),
        "scrollX": true,
        });
        }
    });
}



