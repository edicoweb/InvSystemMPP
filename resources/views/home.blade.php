@extends('layouts.app')

@section('content')
<div class="wrapper">
  <div class="content-wrapper">
     <section class="content">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
      </ol>
      <div class="row">  
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <div class="col-md-6" style=" padding-left: 0px; padding-right: 0px; padding:10px;">
              <h3 class="box-title">PANEL PRINCIPAL(Historial)</h3>
                </div>
              <div class="col-md-6" style=" padding-left: 0px; padding-right: 0px;">
              <form action="#" method="GET" class="form ml-3">                
                <div class="input-group">
                  <input type="text" name="id" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </form>
            </div>
            </div>
            <div class="box-body">
              <table class="table table-hover table-striped">
                <tr>
                  <th style="width: 50px">Id</th>
                  <th>Ip</th>                  
                  <th>Equipo</th>
                  <th>Codigo</th>
                  <th>Funcionario</th>
                  <th>Cargo</th>
                  <th>Area</th>
                  <th>Sede</th>
                  <th style="width: 60px">Detalle</th>
                </tr>
                  @foreach ($equipo_computos as $equipo_computo)
                  <tr>
                    <td><?php echo $equipo_computo['id']?></td>
                    <td><?php echo $equipo_computo['protocolo_internet']['ip']?></td>
                    <td><?php echo $equipo_computo['tipo_equipo']['nombre_tipo_equipo']?></td>
                    <td><?php echo $equipo_computo['funcionario']['codigo_plaza']?></td>
                    <td><?php echo $equipo_computo['funcionario']['nombre']," ", $equipo_computo['funcionario']['apellido_paterno'], " ", $equipo_computo['funcionario']['apellido_materno']?></td>
                    <td><?php echo $equipo_computo['funcionario']['cargo']['nombre_cargo']?></td>
                    <td><?php echo $equipo_computo['funcionario']['area']['nombre_area']?></td>
                    <td><?php echo $equipo_computo['funcionario']['area']['sede']['nombre_sede']?></td>
                    <td>
                      <button type="button" class="btn btn-info"  data-toggle="modal"  data-target="#modal-lg{{$equipo_computo->id}}">
                        <i class="fa fa-eye"></i>
                      </button>
                      <div class="modal fade" id="modal-lg{{$equipo_computo->id}}" tabindex="-1" role="dialog" >
                        <div class="modal-dialog modal-lg" style="width: 80%;" role="document">
                          <div class="col-md-12">
                            <div class="modal-content" style=" background-color: #f6f4fd;">
                              <div class="modal-header"> 
                                <div class="col-xs-6">
                                  <h2><a href="#"><img alt="" src="{{ asset('dist/img/puno.png')}}" style="width: 50px;"></a><small> MUNICIPALIDAD PROVINCIAL DE PUNO</small></h2>
                                </div>
                                <div class="col-xs-6 text-right">
                                  <h2><small>IP: <?php echo $equipo_computo['protocolo_internet']['ip']?> </small></h2>
                                </div>
                              </div> 
                              <br/>
                              <div class="col-xs-12">
                                <h4><em><b>Funcionario / Cargo::</b></em></h4>
                                <table class="table">
                                  <tr>
                                    <th>Codigo</th>
                                    <th>Nombre(s)</th>
                                    <th>apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Cargo</th>
                                  </tr>
                                  <tr>
                                    <td><?php echo $equipo_computo['funcionario']['codigo_plaza']?></td>
                                    <td><?php echo $equipo_computo['funcionario']['nombre']?></td>
                                    <td><?php echo $equipo_computo['funcionario']['apellido_paterno']?></td>
                                    <td><?php echo $equipo_computo['funcionario']['apellido_materno']?></td>
                                    <td><?php echo $equipo_computo['funcionario']['cargo']['nombre_cargo']?></td>
                                  </tr>
                                  <tr>
                                    <td><b>observación: </b></td>
                                    <td colspan="4"><?php echo $equipo_computo['funcionario']['observacion']?></td>
                                  </tr>
                                </table> 
                              </div>
                              <div class="col-xs-12">
                                <h4><em><b>Sede / Area::</b></em></h4>
                                <table class="table">
                                  <tr>
                                    <th>Sede</th>
                                    <th>Area</th>
                                    <th>Sigla</th>
                                  </tr>
                                  <tr>
                                    <td><?php echo $equipo_computo['funcionario']['area']['sede']['nombre_sede']?></td>
                                    <td><?php echo $equipo_computo['funcionario']['area']['nombre_area']?></td>
                                    <td><?php echo $equipo_computo['funcionario']['area']['sigla_area']?></td>
                                  </tr>                      
                                </table>
                              </div>
                              <div class="col-xs-12">
                                <h4><em><b>Equipo Computo::</b></em></h4>
                                <table class="table">
                                  <tr>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Nombre del Equipo</th>
                                    <th>Dirección MAC</th>
                                    <th>Nombre de Usuario</th>
                                  </tr>
                                  <tr>
                                    <td><?php echo $equipo_computo['tipo_equipo']['nombre_tipo_equipo']?></td>
                                    <td><?php echo $equipo_computo['marca']?></td>
                                    <td><?php echo $equipo_computo['modelo']?></td>
                                    <td><?php echo $equipo_computo['nombre_equipo']?></td>
                                    <td><?php echo $equipo_computo['direccion_mac']?></td>
                                    <td><?php echo $equipo_computo['nombre_usuario_equipo']?></td>
                                  </tr>
                                  <tr>
                                    <td><b>observación: </b></td>
                                    <td colspan="5"><?php echo $equipo_computo['observacion']?></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="col-xs-12">
                                <h4><em><b>Protócolo de Internet::</b></em></h4>
                                <table class="table">
                                  <tr>
                                    <th>IP</th>
                                    <th>Puerta de enlace</th>
                                    <th>Observaciones</th>
                                  </tr>
                                  <tr>
                                    <td><?php echo $equipo_computo['protocolo_internet']['ip']?></td>
                                    <td><?php echo $equipo_computo['protocolo_internet']['puerta_enlace']?></td>
                                    <td><?php echo $equipo_computo['protocolo_internet']['observacion']?></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="col-xs-12">
                                <h4><em><b>Servicios::</b></em></h4>
                                <table class="table">
                                  <tr>
                                    <th>Servicios Activos</th>
                                  </tr>
                                  <tr>
                                    <td>
                                    @foreach ($equipo_computo['funcionario']['servicio'] as $e)
                                      <p><i class="glyphicon glyphicon-check"></i>{{ $e->nombre_servicio }} <br/></p>  
                                    @endforeach
                                    <br/>
                                  </tr>
                                </table>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Exportar en PDF</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach
              </table>
              {{ $equipo_computos->render()}}
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
  </div>
</div>
@endsection
