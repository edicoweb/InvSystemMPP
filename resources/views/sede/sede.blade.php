@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content">
    <ol class="breadcrumb">
      <li><a href="{{ asset('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a class="active"></a>Sedes</li>
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
                <a href="{{ route('sede.create') }}" class="btn btn-info" >Añadir Sede</a>
              </div>
            </div>
            <div class="col-md-6" style=" padding-left: 0px; padding-right: 0px;">
              <form action="#" method="GET" class="form ml-3">                
                <div class="input-group">
                  <input type="text" name="nombre_sede" class="form-control" placeholder="Buscar por Nombre">
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
                @foreach ($sedes as $sede)
                <tr>
                  <td><?php echo $sede['id_sede']?></td>
                  <td><?php echo $sede['nombre_sede']?></td>
                  <td style="display:flex; flex-direction:row;">
                    <a class="btn btn-primary btn-xs" href="{{ route('sede.edit', $sede->id_sede)}}" style="margin-right:5px;"><span class="glyphicon glyphicon-pencil"></span></a>
                    <form action="{{ route('sede.destroy', $sede['id_sede']) }}" method="post">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <button class="btn btn-danger btn-xs" onclick="return confirm('Estas Seguro que quieres Eliminar?')" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </table>
              {{ $sedes->render()}}
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
