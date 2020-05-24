$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend  : function(){
        $('.text-danger').html('')
    },
    error       : function(xhr, textStatus, errorThrown){

        jQuery.throughObject(xhr.responseJSON[0]);

    },
    done    : function(){
        console.log("done");
    },
    always  : function(){
        console.log("always");
    }
});

//cambiar al select
function chargeInput_select(id,defecto="default",value=0)
{
    $("#"+id).replaceWith('<select name="'+id+'" id="'+id+'" class="selectpicker" data-width="80%" data-live-search="true"><option value="'+value+'">'+defecto+'</option></select>');
}





//para los errores
jQuery.throughObject = function(obj){

    for(var attr in obj){
        $('.error-'+attr).html(obj[attr][0]);
      if(typeof obj[attr] === 'object'){
      }
    }
  }
//para el formulario
  $.fn.serializeObject = function(){
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

function acomodarcol(data){
    var arr = [];
    $.each(data[0].principal , function( index2, value2 ) {
        var o = {title:index2,data:index2};
        arr.push(o);
    });
    return arr;
}

function acomodarData(data,col){
        var arr = [];
        $.each(data , function( index, value ) {
            var o = value.principal;
            $.each(value.principal , function( index2, value2 ) {
                $.each(value.relation , function( index3, value3 ) {
                    if(index2 == value3.column_name){
                            var nom = col[value3.column_name];
                            o[index2]= value3.data[nom];
                    }
                });
            });
            arr.push(o);
        });
        return arr;
}
