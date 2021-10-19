@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a class="active"></a>Equipos de Computo</li>
    </ol>
    <div class="content1">
        @if(Session::has('notice'))
        <p class="alert alert-success">{{ Session::get('notice') }}</p>
         @endif
    </div>
    <div class="content1">
      @if(Session::has('message'))
      <p class="alert alert-danger">{{Session::get('message')}}</p>
      @endif
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="pull-right">
                <div class="btn-group">
                  <a href="{{ route('equipo_computo.create') }}" class="btn btn-info" >Añadir Equipos de Cómputo</a>
                </div>
              </div>
              <div class="col-md-6" style=" padding-left: 0px; padding-right: 0px;">
                <form action="#" method="GET" class="form ml-3">                
                  <div class="input-group">
                    <input type="text" name="marca" class="form-control" placeholder="Buscar por nombre Marca">
                    <span class="input-group-btn">
                      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
                    </span>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 50px">Id</th>
                  <th>Tipo de Equipo</th>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Nombre Equipo</th>
                  <th>Dirección MAC</th>
                  <th>Ip</th>
                  <th>Nombre de Usuario</th>
                  <th>Funcionario</th>
                  <th>Observación</th>
                  <th style="width: 50px;">Opciones</th>
                </tr>
                  @foreach ($equipo_computos as $equipo_computo)
                  <tr>
                    <td><?php echo $equipo_computo['id']?></td>
                    <td><?php echo $equipo_computo['tipo_equipo']['nombre_tipo_equipo']?></td>
                    <td><?php echo $equipo_computo['marca']?></td>
                    <td><?php echo $equipo_computo['modelo']?></td>
                    <td><?php echo $equipo_computo['nombre_equipo']?></td>
                    <td><?php echo $equipo_computo['direccion_mac']?></td>
                    <td><?php echo $equipo_computo['protocolo_internet']['ip']?></td>
                    <td><?php echo $equipo_computo['nombre_usuario_equipo']?></td>
                    <td><?php echo $equipo_computo['funcionario']['nombre']," ", $equipo_computo['funcionario']['apellido_paterno'], " ", $equipo_computo['funcionario']['apellido_materno']?></td>
                    <td><?php echo $equipo_computo['observacion']?></td>
                    <td style="display:flex; flex-direction:row;">
                      <a class="btn btn-primary btn-xs" href="{{ route('equipo_computo.edit', $equipo_computo->id)}}" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil"></span></a>
                      <form action="{{ route('equipo_computo.destroy', $equipo_computo['id']) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <button class="btn btn-danger btn-xs" onclick="return confirm('Estas Seguro que quieres Eliminar?')" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
              </table>
              {{ $equipo_computos->render()}}
            </div>

          </div>
        </div>
      </div>
  </section>
        <!-- /.box -->
</div>
<script type="text/javascript">
  $(document).ready(function() {
      setTimeout(function() {
          $(".content1").fadeOut(1500);
      },3000);
  });
</script>
@endsection
