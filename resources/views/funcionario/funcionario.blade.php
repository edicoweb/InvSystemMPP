@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a class="active"></a>Funcionarios</li>
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
                  <a href="{{ route('funcionario.create') }}" class="btn btn-info" >Añadir funcionario</a>
                </div>
              </div>
              <div class="col-md-6" style=" padding-left: 0px; padding-right: 0px;">
                <form action="#" method="GET" class="form ml-3">                
                  <div class="input-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre Nombre del Funcionario">
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
                  <th style="width: 35px">Id</th>
                  <th style="width: 50px">Codigo</th>
                  <th>Funcionario</th>
                  <th>Area</th>
                  <th>Cargo</th>
                  <th>Servicio</th>
                  <th>Observación</th>
                  <th style="width: 50px;">Opciones</th>
                </tr>
                  @foreach ($funcionarios as $funcionario)
                  <tr>
                    <td><?php echo $funcionario['id_funcionario']?></td>
                    <td><?php echo $funcionario['codigo_plaza']?></td>
                    <td><?php echo $funcionario['nombre'], " ", $funcionario['apellido_paterno']," ", $funcionario['apellido_materno']?></td>
                    <td><?php echo $funcionario['area']['nombre_area']?></td>
                    <td><?php echo $funcionario['cargo']['nombre_cargo']?></td>
                    <td>
                     <ul> 
                     @if(count($funcionario->servicio)>0)
                     @foreach($funcionario->servicio as $servicioss)
                      <li>
                      <?php echo $servicioss['nombre_servicio'] ?> 
                      </li>
                      @endforeach
                      @else 
                      <a href="#">Añadir Servicio</a> 
                      @endif
                     </ul>
                    </td>                    
                    <td><?php echo $funcionario['observacion']?></td>
                    <td style="display:flex; flex-direction:row;">
                      <a class="btn btn-primary btn-xs" href="{{ route('funcionario.edit', $funcionario->id_funcionario)}}" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil"></span></a>
                      <form action="{{ route('funcionario.destroy', $funcionario['id_funcionario']) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <button class="btn btn-danger btn-xs" onclick="return confirm('Estas Seguro que quieres Eliminar?')" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
              </table>
              {{ $funcionarios->render()}}
            </div>
          </div>
        </div>
      </div>
  </section>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
        setTimeout(function() {
            $(".content1").fadeOut(1500);
        },3000);
    });
  </script>
@endsection