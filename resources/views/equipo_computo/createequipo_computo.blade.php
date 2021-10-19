@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('funcionario') }}">Equipos de Computo</a></li>
      <li> <a class="active"></a>Crear Equipo de Computo</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">CREAR EQUIPO DE COMPUTO</h3>
          </div>
          <form method="POST" action = "{{ url('equipo_computo') }}" role="form">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('marca') ? 'has-error' : '' }}">
                  <label for="nombre">Marca</label>
                  <input type="text" class="form-control" name="marca" value="{{ old('marca') }}" placeholder="Ingrese Marca">
                  @if ($errors->has('marca'))
                    <span class="help-block">
                      <strong>{{ $errors->first('marca') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('modelo') ? 'has-error' : '' }}">
                  <label for="nombre">Modelo</label>
                  <input type="text" class="form-control" name="modelo" value="{{ old('modelo') }}" placeholder="Ingrese Modelo">
                  @if ($errors->has('modelo'))
                    <span class="help-block">
                      <strong>{{ $errors->first('modelo') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('nombre_equipo') ? 'has-error' : '' }}">
                  <label for="nombre">Nombre del Equipo</label>
                  <input type="text" class="form-control" name="nombre_equipo" value="{{ old('nombre_equipo') }}" placeholder="Ingrese Nombre">
                  @if ($errors->has('nombre_equipo'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nombre_equipo') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('nombre_usuario_equipo') ? 'has-error' : '' }}">
                  <label for="nombre">Nombre del Usuario</label>
                  <input type="text" class="form-control" name="nombre_usuario_equipo" value="{{ old('nombre_usuario_equipo') }}" placeholder="Ingrese Nombre de Usuario">
                  @if ($errors->has('nombre_usuario_equipo'))
                    <span class="help-block">
                      <strong>{{ $errors->first('nombre_usuario_equipo') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('direccion_mac') ? 'has-error' : '' }}">
                  <label for="nombre">Dirección MAC</label>
                  <input type="text" class="form-control" name="direccion_mac" value="{{ old('direccion_mac') }}" placeholder="Ingrese Dirección MAC">
                  @if ($errors->has('direccion_mac'))
                  <span class="help-block">
                    <strong>{{ $errors->first('direccion_mac') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('id_ip') ? ' has-error' : '' }}">
                  <label for="nombre">Protocolo de Internet</label>
                  <select name="id_ip" class="form-control">
                    <option value="">--Selecione ip--</option>
                    @foreach($protocolo_internets as $protocolo_internet)
                      <option value="{{ $protocolo_internet['id_ip'] }}"> {{$protocolo_internet['ip'] }}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('id_ip'))
                    <span class="help-block">
                      <strong>{{ $errors->first('id_ip') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('id_funcionario') ? ' has-error' : '' }}">
                  <label for="nombre">Funcionario</label>
                  <select name="id_funcionario" class="form-control">
                    <option value="">--Selecione Funcionario--</option>
                    @foreach($funcionarios as $funcionario)
                      <option value="{{ $funcionario['id_funcionario'] }}">{{$funcionario['nombre']}} {{$funcionario['apellido_paterno']}} {{$funcionario['apellido_materno']}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('id_funcionario'))
                    <span class="help-block">
                      <strong>{{ $errors->first('id_funcionario') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('id_tipo_equipo') ? ' has-error' : '' }}">
                  <label for="nombre">Tipo Equipo</label>
                  <select name="id_tipo_equipo" class="form-control">
                    <option value="">--Selecione Tipo Equipo--</option>
                    @foreach($tipo_equipos as $tipo_equipo)
                      <option value="{{ $tipo_equipo['id_tipo_equipo'] }}">{{$tipo_equipo['nombre_tipo_equipo']}}</option>
                    @endforeach
                  </select>
                  @if ($errors->has('id_tipo_equipo'))
                    <span class="help-block">
                      <strong>{{ $errors->first('id_tipo_equipo') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group{{ $errors->has('observacion') ? 'has-error' : '' }}">
                  <label for="nombre">observacion</label>
                  <textarea type="text" class="form-control" name="observacion"  value="{{ old('observacion') }}" placeholder="Ingrese observacion"></textarea>
                  @if ($errors->has('observacion'))
                    <span class="help-block">
                      <strong>{{ $errors->first('observacion') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ url('equipo_computo') }}" type="button" class="btn btn-danger">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
