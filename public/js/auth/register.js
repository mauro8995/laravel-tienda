


function create(){
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

get();
function get()
{
    $.ajax({
        type: "POST",
        url: '/user/users',
        data: {},
        success: function(response)
        {
            $('#dtBasicExample').DataTable({
                data:response.data,
                columns:[
                    {data:'id'},
                    {data:'first_name'},
                    {data:'last_name'},
                    {data:'email'},
                    {data:'email_verified_at'},
                    {data:'email_verified_at'},
                    {data:'email_verified_at'},
                    {data:'google_id'},
                ],
                select:true,
                "paging":false
            });

       }
   });
}



