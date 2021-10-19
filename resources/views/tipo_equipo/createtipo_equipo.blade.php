@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('tipo_equipo') }}">Tipo de Equipo</a></li>
      <li> <a class="active"></a>Crear Tipo de Equipo</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">CREAR TIPO DE EQUIPO</h3>
          </div>
          <form method="POST" action = "{{ url('tipo_equipo') }}" role="form">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group{{ $errors->has('nombre_tipo_equipo') ? 'has-error' : '' }}">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre_tipo_equipo" value="{{ old('nombre_tipo_equipo') }}" placeholder="Ingrese Nombre">
                  @if ($errors->has('nombre_tipo_equipo'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre_tipo_equipo') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="{{ url('tipo_equipo') }}" type="button" class="btn btn-danger">Cancelar</a>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
