@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('cargo') }}">Cargo</a></li>
      <li> <a class="active"></a>Crear Cargo</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">CREAR CARGO</h3>
          </div>
          <form method="POST" action = "{{ url('cargo') }}" role="form">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group{{ $errors->has('nombre_cargo') ? 'has-error' : '' }}">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre_cargo" value="{{ old('nombre_cargo') }}" placeholder="Ingrese Nombre">
                  @if ($errors->has('nombre_cargo'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre_cargo') }}</strong>
                  </span>
                  @endif
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="{{ url('cargo') }}" type="button" class="btn btn-danger">Cancelar</a>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
