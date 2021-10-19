@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a class="active"></a>Areas</li>
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
                  <a href="{{ route('area.create') }}" class="btn btn-info" >Añadir Area</a>
                </div>
              </div>
              <div class="col-md-6" style=" padding-left: 0px; padding-right: 0px;">
                <form action="#" method="GET" class="form ml-3">                
                  <div class="input-group">
                    <input type="text" name="nombre_area" class="form-control" placeholder="Buscar por Nombre">
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
                  <th>sigla</th>
                  <th>Sede</th>
                  <th style="width: 50px">Opciones</th>
                </tr>
                  @foreach ($areas as $area)
                  <tr>
                    <td><?php echo $area['id_area']?></td>
                    <td><?php echo $area['nombre_area']?></td>
                    <td><?php echo $area['sigla_area']?></td>
                    <td><?php echo $area['sede']['nombre_sede']?></td>
                    <td style="display:flex; flex-direction:row;">
                      <a class="btn btn-primary btn-xs" href="{{ route('area.edit', $area->id_area)}}" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil"></span></a>
                      <form action="{{ route('area.destroy', $area['id_area']) }}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                      <button class="btn btn-danger btn-xs" onclick="return confirm('Estas seguro que quieres Eliminar')" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach
              </table>
              {{ $areas->render() }}
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
