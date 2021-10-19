@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('servicio') }}">Servicios</a></li>
      <li> <a class="active"></a>Crear Servicios</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">CREAR SERVICIOS</h3>
          </div>
          <form method="POST" action = "{{ url('servicio') }}" role="form">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group{{ $errors->has('nombre_servicio') ? 'has-error' : '' }}">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre_servicio" value="{{ old('nombre_servicio') }}" placeholder="Ingrese Nombre">
                  @if ($errors->has('nombre_servicio'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre_servicio') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="{{ url('servicio') }}" type="button" class="btn btn-danger">Cancelar</a>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
