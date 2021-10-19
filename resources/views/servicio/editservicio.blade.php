@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('servicio') }}">Servicios</a></li>
      <li> <a class="active"></a>Editar Servicio</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"> EDITAR SERVICIO</h3>
          </div>
          @foreach ($servicios as $servicio)
          <form method="POST" action = "{{ route('servicio.update', $servicio->id_servicio)}}" role="form">
              {{ csrf_field() }}
              {{method_field('PATCH')}}
            <div class="box-body">
              <div class="form-group{{ $errors->has('nombre_servicio') ? 'has-error' : '' }}">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre_servicio" value="<?php  echo $servicio['nombre_servicio'] ?>" placeholder="Ingrese Nombre">
                @if ($errors->has('nombre_servicio'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre_servicio') }}</strong>
                  </span>
                @endif
                @endforeach
              </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Actualizar</button>
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
