@extends('layouts.external.footer_header')
@section('title', "login")
@section('content')
<div class="contenedor-login" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4">
                <div style="padding-top: 120px;">
                    <H1>BIENVENIDO</H1>
                    <p>
                        Puede ingresar el usuario y contraseña o simplemente ingfresar con su cuenta de gmail
                    </p>
                </div>

            </div>
            <div class="col-xs-4 col-sm-12 col-md-4 col-lg-4">
                <form style="padding-top: 100px;" id="login-form">
                    <div class="form-group">
                        <label for="exampleInputEmail1">CORREO</label>
                        <input type="email" class="form-control" name="email"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="INGRESAR CORREO">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">PASSWORD</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="CONTRASEÑA">
                    </div>
                  </form>
                  <button onclick="login()" class="btn btn-success">Ingresar</button>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-success btn-block">
                    <strong>Login With Google</strong>
                </a>
            </div>

        </div>
    </div>
</div>




@endsection
@section('script')
<script>
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    $( document ).ready(function() {
        $("body").css("background-color", "#CD5C5C");
        $("body").css("color", "#fff");

});

function login(){
    alert(12);
    $.ajax({
        type: "POST",
        url: '/login/user/otro',
        data: {
            data:$("#login-form").serializeObject()},
        success: function(response)
        {
            location.href = "/main/view";
        }
    });
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

</script>

@endsection
