function create(){
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

get();
function get()
{
    $.ajax({
        type: "POST",
        url: '/user/permissons',
        data: {},
        success: function(response)
        {
            var col =   {"modified_by":'last_name',
                            "created_by":'last_name'
                        };
            var final = acomodarData(response.data,col);
            $('#dtBasicExample').DataTable({
                data:final,
                columns:acomodarcol(response.data),
                select:true,
                "paging":false
            });
        }
    });
}



