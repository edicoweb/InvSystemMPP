@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('area') }}">Areas</a></li>
      <li> <a class="active"></a>Editar Area</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">EDITAR AREA</h3>
          </div>
          @foreach($areas as $area)
          <form method="POST" action = "{{ route ('area.update', $area->id_area) }}" role="form">
            {{ csrf_field() }}
            {{method_field('PATCH')}}
            <div class="box-body">
              <div class="form-group{{ $errors->has('nombre_area') ? 'has-error' : '' }}">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre_area" value="<?php  echo $area['nombre_area'] ?>" placeholder="Ingrese Nombre">
                @if ($errors->has('nombre_area'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre_area') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('sigla_area') ? 'has-error' : '' }}">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="sigla_area" value="<?php  echo $area['sigla_area'] ?>" placeholder="Ingrese Sigla">
                @if ($errors->has('sigla_area'))
                  <span class="help-block">
                    <strong>{{ $errors->first('sigla_area') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('id_sede') ? ' has-error' : '' }}">
                <label for="nombre">Sedes</label>
                <select name="id_sede" class="form-control">
                  @foreach($sedes as $sed)
                  <option value="{{ $sed['id_sede'] }}"> {{ $sed['nombre_sede'] }} </option>
                  @endforeach
                </select>
                @if ($errors->has('id_sede'))
                  <span class="help-block">
                    <strong>{{ $errors->first('id_sede') }}</strong>
                  </span>
                @endif
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ url('area') }}" type="button" class="btn btn-danger">Cancelar</a>
              </div>
            </div>
          </form>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
