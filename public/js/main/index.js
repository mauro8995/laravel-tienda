

function register(){
    $.ajax({
        type: "POST",
        url: '/main/register',
        data: {data:$("#main-register").serializeObject()},
        success: function(response)
        {


        }
    });
}
getSection();
function getSection(){
    $.ajax({
        type: "POST",
        url: '/main/register/get/section',
        data: {},
        success: function(response)
        {
            chargeInput_select('section');
            chargeInput_select('father');
            $.each(response.data.section, function(id,value){
                $('#section').append('<option value="'+value.id+'">'+value.description+'</option>');
                    });
            $('#section').selectpicker('render');
            $.each(response.data.father, function(id,value){
                $('#father').append('<option value="'+value.id+'">'+value.description+'</option>');
                    });
                    $('#father').selectpicker('render');
        }
    });
}

getFillUrl();
function getFillUrl(){
    $.ajax({
        type: "POST",
        url: '/main/register/get',
        data: {},
        success: function(response)
        {
            var col =   {"modified_by":'last_name',
                            "created_by":'last_name'
                        };
            var final = acomodarData(response.data,col);
            $('#dturl').DataTable({
                data:final,
                columns:acomodarcol(response.data),
                select:true,
                "paging":false
            });
        }
    });
}
