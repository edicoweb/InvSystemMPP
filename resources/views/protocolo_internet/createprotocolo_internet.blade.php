@extends('layouts.app')

@section('content')


<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="{{ asset('protocolo_internet') }}">Protocolos de Internet</a></li>
      <li> <a class="active"></a>Crear Protocolo de Internet</li>
    </ol>

    <div class="row">
      <div class="col-md-10">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">CREAR PROTOCOLO DE INTERNET</h3>
          </div>

          <form method="POST" action = "{{ url('protocolo_internet') }}" role="form">
            {{ csrf_field() }}
            <div class="box-body">

              <div class="form-group{{ $errors->has('ip') ? 'has-error' : '' }}">
                <label for="nombre">Protócolo de Internet</label>
                <input type="text" class="form-control" name="ip" value="{{ old('ip') }}" placeholder="Ingrese Protocolo Internet">
                  @if ($errors->has('ip'))
                  <span class="help-block">
                    <strong>{{ $errors->first('ip') }}</strong>
                  </span>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('puerta_enlace') ? 'has-error' : '' }}">
                  <label for="nombre">Puerta de Enlace</label>
                  <input type="text" class="form-control" name="puerta_enlace" value="{{ old('puerta_enlace') }}" placeholder="Ingrese puerta Enlace">
                    @if ($errors->has('puerta_enlace'))
                    <span class="help-block">
                      <strong>{{ $errors->first('puerta_enlace') }}</strong>
                    </span>
                    @endif
                  </div>

                  <div class="form-group{{ $errors->has('observacion') ? 'has-error' : '' }}">
                    <label for="nombre">observación</label>
                    <textarea type="text" class="form-control" name="observacion"  value="{{ old('observacion') }}" placeholder="Describa aqui si tiene alguna Observacion"></textarea>
                      @if ($errors->has('observacion'))
                      <span class="help-block">
                        <strong>{{ $errors->first('observacion') }}</strong>
                      </span>
                      @endif
                    </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
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
