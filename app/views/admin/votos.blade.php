@extends('admin.layout')

@section('styles')
<link href="{{ URL::to('/css/admin/plugins/datatables/bootstrap-datatable.css') }}" media="all" rel="stylesheet" type="text/css" />
@parent
@stop

@section('content')
<div class="page-header">
  <h1 class="pull-left">
    <i class="icon-bullhorn"></i>
    <span>Votos por categor&iacute;a</span>
  </h1>
</div>

@include('admin.partials.mensajes')

@foreach($categorias as $categoria)
<div class="row">
  <div class="col-sm-12">
    <div class="box box-collapsed">
      <div class="box-header purple-background">
        <div class="title">{{{ $categoria->nombre }}}</div>
        <div class="actions">          
          <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
          </a>
        </div>
      </div>
      <div class="box-content">
        <div class="scrollable-area">
          <table class="data-table2 table table-bordered table-striped">
            <thead>
              <tr>
                <th>Usuario</th>
                <th>Votos</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($categoria->participantes() as $usuario)
              <tr>
                <td>{{ $usuario->mostrarVoto() }}</td>
                <td>{{ $usuario->contarVotos() }}</td>
                <td>
                  <div class="text-right">
                    <a class="btn btn-primary btn-xs ver-votos" href="#" data-categoria="{{ $usuario->categoria_id }}" data-twitero="{{ $usuario->twitero_id }}" alt="Ver Votos" title="Ver Votos">
                      <i class="icon-search"></i>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
@stop

@section('script')
@parent
<script src="{{ URL::to('/js/admin/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::to('/js/admin/plugins/datatables/jquery.dataTables.columnFilter.js') }}" type="text/javascript"></script>
<script src="{{ URL::to('/js/admin/plugins/datatables/dataTables.overrides.js') }}" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.data-table2').dataTable( {
      "aaSorting": [[ 1, "desc" ]],
      "sPaginationType": "bootstrap",
      "iDisplayLength": 25,
      "bLengthChange": false,
      "oLanguage": {
        "sProcessing":     "Procesando...",
        "sZeroRecords": "No hay registros por el momento",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sSearch": "Buscar: ",
        "sInfoFiltered": "",
        "sInfoEmpty": "",
        "oPaginate": {
          "sNext": " Siguiente ",
          "sPrevious": " Anterior "
        }
      }
    } );
  } );
</script>
@stop