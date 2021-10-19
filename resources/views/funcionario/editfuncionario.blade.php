@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('funcionario') }}">Funcionarios</a></li>
      <li> <a class="active"></a>Editar funcionario</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">EDITAR FUNCIONARIO</h3>
          </div>
          @foreach($funcionarios as $funcionario)
          <form method="POST" action = "{{ route ('funcionario.update', $funcionario->id_funcionario) }}" role="form">
            {{ csrf_field() }}
            {{method_field('PATCH')}}
            <div class="box-body">
              <div class="col-md-12">
                <div class="form-group{{ $errors->has('codigo_plaza') ? 'has-error' : '' }}">
                  <label for="nombre">Codigo Plaza</label>
                  <input type="text" class="form-control" name="codigo_plaza" value="<?php  echo $funcionario['codigo_plaza'] ?>" placeholder="Ingrese Codigo Plaza">
                  @if ($errors->has('codigo_plaza'))
                  <span class="help-block">
                    <strong>{{ $errors->first('codigo_plaza') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group{{ $errors->has('nombre') ? 'has-error' : '' }}">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombre" value="<?php  echo $funcionario['nombre'] ?>" placeholder="Ingrese Nombre">
                  @if ($errors->has('nombre'))
                  <span class="help-block">
                    <strong>{{ $errors->first('nombre') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('apellido_paterno') ? 'has-error' : '' }}">
                  <label for="nombre">Apellido Paterno</label>
                  <input type="text" class="form-control" name="apellido_paterno" value="<?php  echo $funcionario['apellido_paterno'] ?>" placeholder="Ingrese Apellido Paterno">
                  @if ($errors->has('apellido_paterno'))
                  <span class="help-block">
                    <strong>{{ $errors->first('apellido_paterno') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('apellido_materno') ? 'has-error' : '' }}">
                  <label for="nombre">Apellido Materno</label>
                  <input type="text" class="form-control" name="apellido_materno" value="<?php  echo $funcionario['apellido_materno'] ?>" placeholder="Ingrese Apellido Materno">
                  @if ($errors->has('apellido_materno'))
                  <span class="help-block">
                    <strong>{{ $errors->first('apellido_materno') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              @endforeach
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('id_area') ? ' has-error' : '' }}">
                  <label for="nombre">Area</label>
                  <select name="id_area" class="form-control">
                    <option value="">--Selecione Area--</option>
                    @foreach($areas as $area)
                    <option value="{{ $area['id_area'] }}"> {{$area['nombre_area'] }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('id_area'))
                  <span class="help-block">
                    <strong>{{ $errors->first('id_area') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('id_cargo') ? ' has-error' : '' }}">
                  <label for="nombre">Cargo</label>
                  <select name="id_cargo" class="form-control">
                    <option value="">--Selecione Cargo--</option>
                    @foreach($cargos as $cargo)
                    <option value="{{ $cargo['id_cargo'] }}"> {{$cargo['nombre_cargo'] }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('id_cargo'))
                  <span class="help-block">
                    <strong>{{ $errors->first('id_cargo') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              @foreach($funcionarios as $funcionario)
              <div class="col-md-12">
                <div class="form-group{{ $errors->has('observacion') ? 'has-error' : '' }}">
                  <label for="nombre">observacion</label>
                  <input type="text" class="form-control" name="observacion" value="<?php  echo $funcionario['observacion'] ?>" placeholder="observacion">
                  @if ($errors->has('observacion'))
                  <span class="help-block">
                    <strong>{{ $errors->first('observacion') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
                @endforeach
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="{{ url('funcionario') }}" type="button" class="btn btn-danger">Cancelar</a>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
