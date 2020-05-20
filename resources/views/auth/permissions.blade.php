@extends('layouts.admin')
@extends('auth.menu-admin')
@section('content')
@if ($squemas)
@php
    $titulo = $squemas;
@endphp
    @section('title', array_pop($titulo)->table_name)
@else
    @section('title', "no hay titulo")
@endif


    <section>

        <div class="container-fluid" style="padding: 25px;">
            <form id="permissions-register">
                @php
                    $contador = 0;
                @endphp
                @foreach ($squemas as $col)


                    @if ($col->column_name == "id")
                            <input type="hidden" name="{{$col->column_name}}" id="{{$col->column_name}}">
                    @else
                            @if ($contador ==0)
                            <div class="form-row">
                            @endif

                            <div class="form-group col-md-6">
                                <label for="inputEmail4">{{ $col->column_name }} @if($col->is_nullable == "NO")
                                    *
                                @endif <strong class="text-danger error-{{$col->column_name}}"></strong></label>
                                <input type="{{$col->udt_name}}" class="form-control " name="{{ $col->column_name }}" id="{{ $col->column_name }}" >
                            </div>
                            @php
                                $contador++;
                            @endphp

                            @if ($contador ==2)
                                </div>
                                @php
                                    $contador=0;
                                    continue;
                                @endphp
                            @endif
                    @endif


                @endforeach
            </form>
        </div>

    </section>

    <section>
        <div class="container-fluid">
            <div class="row">
                <button type="button" class="btn btn-primary" onclick="create();">REGISTRAR</button>
            </div>
        </div>

    </section>



    <section>

        <div class="container-fluid w-100">
            <div class="row">

                <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                      <tr>


                      </tr>
                    </thead>
                    <tbody>

                      </tbody>
                    <tfoot>
                      <tr>

                      </tr>
                    </tfoot>
                  </table>
            </div>
        </div>

    </section>



@endsection

@section('script')
<script src="{{asset('js/auth/permissions.js')}}"></script>
@endsection
