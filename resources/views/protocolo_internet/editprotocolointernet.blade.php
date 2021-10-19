@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('protocolo_internet') }}">Protocolo de Internet</a></li>
      <li> <a class="active"></a>Editar Protocolo de Internet</li>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"> EDITAR PROTOCOLO DE INTERNET</h3>
          </div>
          @foreach ($protocolo_internets as $protocolo_internet)
          <form method="POST" action = "{{ route('protocolo_internet.update', $protocolo_internet->id_ip)}}" role="form">
            {{ csrf_field() }}
            {{method_field('PATCH')}}
            <div class="box-body">
              <div class="form-group{{ $errors->has('ip') ? 'has-error' : '' }}">
                <label for="nombre">Protocolo de Internet</label>
                <input type="text" class="form-control" name="ip" value="<?php  echo $protocolo_internet['ip'] ?>" placeholder="Ingrese Ip">
                @if ($errors->has('ip'))
                <span class="help-block">
                  <strong>{{ $errors->first('ip') }}</strong>
                </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('puerta_enlace') ? 'has-error' : '' }}">
                <label for="nombre">Puerta de Enlace</label>
                <input type="text" class="form-control" name="puerta_enlace" value="<?php  echo $protocolo_internet['puerta_enlace'] ?>" placeholder="Ingrese Puerta de Enlace">
                @if ($errors->has('puerta_enlace'))
                  <span class="help-block">
                    <strong>{{ $errors->first('puerta_enlace') }}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group{{ $errors->has('observacion') ? 'has-error' : '' }}">
                <label for="nombre">observacion</label>
                <input type="text" class="form-control" name="observacion" value="<?php  echo $protocolo_internet['observacion'] ?>" placeholder="observacion">
                @if ($errors->has('observacion'))
                <span class="help-block">
                  <strong>{{ $errors->first('observacion') }}</strong>
                </span>
                @endif
              </div>
              @endforeach
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ url('protocolo_internet') }}" type="button" class="btn btn-danger">Cancelar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
