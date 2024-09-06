@extends('admin.main')

@section('page-title')
Banners Cadastrados
@endsection

@section('page-caminho')
Banners
@endsection

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

<div class="col-12">

  <div class="card-box">
    <a data-toggle="modal" data-target="#modal-default" style="margin-bottom: 15px" class="btn btn-info waves-effect waves-light pull-right"><i class="fa fa-plus m-r-5"></i> Adicionar</a>
      {{--MODAL INSERE --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cadastrar Banner</h4>
                </div>
              {{ Form::open(['route' => 'banners.store', 'files' => true]) }}
                {{ csrf_field() }}
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-md-6">
                          {{ Form::label('caminho','Imagem') }}
                          <input type="file" name="caminho" id="profile-img" class="filestyle" data-buttonText="Carregar" data-placeholder="Resolução ideal 2944 x 600  " data-btnClass="btn-light">
                        </div>
                        <div class="form-group col-md-6">
                          {{ Form::label('video', 'Link do Video') }}
                          {{ Form::text('video', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          {{ Form::label('titulo', 'Titulo ') }}
                          {{ Form::text('titulo', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          {{ Form::label('texto', 'Texto do Banner') }}
                          {{ Form::textarea('texto', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
                        </div>
                      </div>
                        <!-- <p id="req-cad">
                          <a id="cad" class="text-success" href="#">Para adicionar um botão ao banner, clique aqui.</a>
                        </p> -->
                        <!-- <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
                          <div class="row">
                            <div class="form-group col-md-3">
                                {{ Form::label('textobotao', 'Texto Botão') }}
                                {{ Form::text('textobotao', null, array('class' => 'form-control', 'autofocus','maxlength' => '30')) }}
                            </div>
                            <div class="form-group col-md-4">
                              {{ Form::label('link', 'Link') }}
                              {{ Form::text('link', null, array('class' => 'form-control', 'autofocus','maxlength' => '255','placeholder'=>'https://www.google.com')) }}
                            </div>
                            <div class="form-group col-md-2">
                                {{ Form::label('corbotao', 'Cor Botão') }}
                                {{ Form::color('corbotao', '#be9f60', array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
                            </div>
                            <div class="form-group col-md-3">
                                {{ Form::label('lado', 'Lado Botão') }}
                                <br>
                                {{ Form::label('lado', 'Esquerdo') }}
                                {{ Form::radio('lado', 'E' , true) }}
                                {{ Form::label('lado', 'Direito') }}
                                {{ Form::radio('lado', 'D' , false) }}
                            </div>
                          </div>
                        </div> -->
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
    <table class="table table-striped" id="tabela">
        <thead>
        <tr>
          <th>Ordem</th>
          <th>Titulo</th>
          <th>Texto</th>
          <th>Ações</th>
        </tr>
        </thead>
        <tbody id="banner">
          @forelse($banners as $banner)
                <tr id={{$banner->id}}>
                <td width="1%"><i class="fa fa-arrows my-handle"></td>
                <!-- <td width="15%"><img width="400px" src="{{ asset('uploads/banners/'. $banner->caminho) }}"></td> -->
                <td>{{ substr(strip_tags($banner->titulo), 0, 35) }}{{ (strlen(strip_tags($banner->titulo)) > 25 ? "..." : "") }} </td>
                <td>{{ substr(strip_tags($banner->texto), 0, 35) }}{{ (strlen(strip_tags($banner->texto)) > 25 ? "..." : "") }} </td>
                <td width="10%">
                    <span class="hint--top" aria-label="Editar Banner"><a href="{{ route('banners.edit', $banner->id) }}" style="border-radius: 50%" class="btn btn-warning waves-effect"> <i class="fa fa-pencil m-r-5"></i></a></span>
                    <span class="hint--top" aria-label="Deletar Banner"><button type="button" onclick="goswet({{$banner->id}}, '{{$banner->titulo}}')" style="border-radius: 50%" class="btn btn-danger waves-effect"> <i class="fa fa-trash m-r-5"></i></button></span>
                </td>
            </tr>
          @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum Item cadastrado</td>
            </tr>
          @endforelse
        </tbody>
    </table>

@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/switchery/switchery.min.js') }}" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.5.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js" type="text/javascript"></script>

<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#profile-img-tag').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#profile-img").change(function(){
    readURL(this);
});

$(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
  });

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $(function() {
    $('#banner').sortable({
      stop: function(){
        $.map($(this).find('tr'), function(el) {
          var bannerID = el.id;
          var bannerIndex = $(el).index();

          $.ajax({
            url: "{{ url('admin/banners/order') }}",
            type: "POST",
            dataType: 'json',
            data: {bannerID: bannerID, bannerIndex: bannerIndex },
          })

        });
      }
    });
  });

</script>

<script>
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
          url: "{{ url('admin/banners') }}/"+id,
          data: {'id': id},
          success: function(data){
            swal({
             title: "Banner deletado!",
             type: "success",
             timer: 2000,
             showConfirmButton: false
           }).then(
             function () {
             },
             function(){
               window.location = "{{ route('banners.index') }}";
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
