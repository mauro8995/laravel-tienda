


function create_user(){
    $.ajax({
        type: "POST",
        url: '/user/register',
        data: {data:$("#customer-register").serializeObject()},
        success: function(response)
        {
            console.log(response);

       }
   });

}

get_user();
function get_user()
{
    $.ajax({
        type: "POST",
        url: '/user/get',
        data: {},
        success: function(response)
        {
            var col =   {"modified_by":'last_name',
            "created_by":'last_name'
            };
            var final = acomodarData(response.data,col);
            $('#table-users').DataTable({
            data:final,
            columns:acomodarcol(response.data),
            "scrollX": true,
            });

       }
   });
}



