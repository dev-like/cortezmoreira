@extends('admin.main')

@section('page-title')
Convênios Cadastrados
@endsection

@section('page-caminho')
Convênios
@endsection

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box table-responsive">
    {{--MODAL INSERE --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Cadastrar Convênio</h4>
                </div>
              {{ Form::open(['route' => 'convenios.store', 'files' => true]) }}
                {{ csrf_field() }}
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-12">
                          {{ Form::label('descricao', 'Nome do Convênio') }}
                          {{ Form::text('descricao', null, array('class' => 'form-control', 'autofocus','maxlength' => '150','required')) }}
                        </div>
                      </div>
                    </div>

                <div class="modal-footer">
                  <div class="row" style="margin-top: 20px">
                    <div class="col-12">
                      <div class="text-center">
                        <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-window-close m-r-5"></i> Cancelar</button>
                      </div>
                    </div>
                  </div>
                </div>
              {{ Form::close() }}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <table id="datatable" class="table table-bordered">
        <thead>
        <tr>
          <th>Nome</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody>
          @foreach($convenios as $convenio)
            <tr>
                <td>{{ $convenio->descricao }}</td>
                <td width="15%">
                  <span class="hint--top" aria-label="Editar Unidade"><a href="{{ route('convenios.edit', $convenio->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                  <span class="hint--top" aria-label="Deletar Unidade"><button type="button" onclick="goswet({{$convenio->id}}, '{{$convenio->descricao}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('template/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
$(document).ready( function () {
    $('datatable').DataTable();
  var table = $('#datatable').DataTable({
      "dom": "<'row'<'col-sm-12 col-md-10'f> <'col-sm-12 col-md-2'B> >" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
             lengthChange: false,
              "language": {
                "emptyTable": "Nennhum item cadastrado !",
                "info": "Listando _END_ de _MAX_ registros",
                "infoEmpty":      "",
                "lengthMenu":     "Mostrar _MENU_ Registros",
                "search":         "Pesquisa:",
                "zeroRecords":    "Nenhum registro encontrado.",
                "processing":     "Processando...",
                "loadingRecords": "Carregado...",
                "infoFiltered":   "(filtrado de _MAX_ registros)",
                "paginate": {
               "first":      "Primeiro",
               "last":       "Último",
               "next":       "Próximo",
               "previous":   "Anterior"
             }
           },
        buttons: {
          buttons:[
             {
            text: "Adicionar",
            action: function ( e, dt, button, config ) {
              //dt.ajax.reload();
              $('#modal-default').modal('show')
            },
            className: "btn btn-dark waves-effect waves-light pull-right"
          }]
        }
    });
} );


  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  function goswet(id, nome){
    swal.setDefaults({
      reverseButtons: true
    })
    swal({
        title: "Deseja excluir "+nome+"?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Deletar"
    }).then(
      function(){
        $.ajax({
          type: "DELETE",
          url: "{{ url('admin/convenios') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "Convênio deletado!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('convenios.index') }}";
             }
           );
          },
          error: function(xhr,status, data) {
            swal("Não foi possível deletar item");
          }

        });
      }
    );
  }
</script>
@endsection
