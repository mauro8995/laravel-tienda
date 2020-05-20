
    chargeInput_select('id_user');
    chargeInput_select('id_permissions');
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');

    get_users();

    function get_users(){
        $.ajax({
            type: "POST",
            url: '/user/users',
            data: {data:"as"},
            success: function(response)
            {

                $.each(response.data, function(id,value){
                    $('#id_user').append('<option value="'+value.id+'">'+value.last_name+'</option>');
                        });
                        $('#id_user').selectpicker('render');
           }
       });
    }

    get_persmissions();
    function get_persmissions(){
        $.ajax({
            type: "POST",
            url: '/user/permissons',
            data: {data:"as"},
            success: function(response)
            {

                $.each(response.data, function(id,value){
                    $('#id_permissions').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                        $('#id_permissions').selectpicker('render');
           }
       });
    }


    function get_persmissions_user(){
        $.ajax({
            type: "POST",
            url: '/user/permissons/users',
            data: {data:$("#permissions-register").serializeObject()},
            success: function(response)
            {

                var col =   {"modified_by":'last_name',
                            "created_by":'last_name',
                            "id_user":'last_name',
                            "id_permissions":'name',
                            };
                var final = acomodarData(response.data,col);

                $('#table-permissions').DataTable({
                    data:final,
                    columns:acomodarcol(response.data),
                    select:true,
                    // "scrollX": true,
                    "paging":false
                });


           }
       });
    }

    $('#id_user').on('change', function() {
        if(this.value !=0)
        get_persmissions_user();
      });


    function create(){
        $.ajax({
            type: "POST",
            url: '/user/permissons/users/register',
            data: {data:$("#permissions-register").serializeObject()},
            success: function(response)
            {


                //chargeInput_table('table-permissions',response.data);
           }
       });
    }
