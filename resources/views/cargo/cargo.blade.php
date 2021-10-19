@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a class="active"></a>Cargo</li>
    </ol>
    <div class="content1">
      @if(Session::has('message'))
      <p class="alert alert-danger">{{Session::get('message')}}</p>
      @endif
    </div>
    <div class="content1">
      @if(Session::has('notice'))
      <p class="alert alert-success">{{ Session::get('notice') }}</p>
      @endif
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <div class="pull-right">
                <div class="btn-group">
                  <a href="{{ route('cargo.create') }}" class="btn btn-info" >Añadir Cargo</a>
                </div>
              </div>
              <div class="col-md-6" style=" padding-left: 0px; padding-right: 0px;">
                <form action="#" method="GET" class="form ml-3">                
                  <div class="input-group">
                    <input type="text" name="nombre_cargo" class="form-control" placeholder="Buscar por Nombre">
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
                  <th>Nombre</th>
                  <th style="width: 50px;">Opciones</th>
                </tr>
                  @foreach ($cargos as $cargo)
                  <tr>
                    <td><?php echo $cargo['id_cargo']?></td>
                    <td><?php echo $cargo['nombre_cargo']?></td>
                    <td style="display:flex; flex-direction:row;">
                      <a class="btn btn-primary btn-xs" href="{{ route('cargo.edit', $cargo->id_cargo)}}"" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil"></span></a>
                      <form action="{{ route('cargo.destroy', $cargo['id_cargo']) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <button class="btn btn-danger btn-xs" onclick="return confirm('Estas Seguro que quieres Eliminar?')" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
              </table>
              {{ $cargos->render()}}
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
