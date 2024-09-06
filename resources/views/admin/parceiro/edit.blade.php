  @extends('admin.main')

@section('page-title')
Editar Parceiro
@endsection

@section('page-caminho')
Parceiros
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <img src="{{ asset('uploads/parceiro/'.$parceiros->imagem) }}" style="width: 50%">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-12">
  <div class="card-box">
    {{ Form::model($parceiros, ['route' => ['parceiros.update', $parceiros->id], 'method' => 'PUT', 'files' => true]) }}
      <div class="row">
        <div class="form-group col-md-7">
          {{ Form::label('imagem','Imagem') }}
          <input type="file" name="imagem" id="profile-img" class="filestyle" data-buttonText="Carregar" data-placeholder="{{$parceiros->imagem}}" data-btnClass="btn-light">
        </div>
        <div class="form-group col-md-5">
          {{ Form::label('imagem', 'Imagem Cadastrada') }}
          <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#modal-default">Abrir imagem</button>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('texto', 'Texto Parceiro') }}
          {{ Form::textarea('texto', null, array('class' => 'form-control', 'autofocus','maxlength' => '150','required')) }}
        </div>
      </div>

      <div class="row" style="margin-top: 20px">
        <div class="form-group col-12">
          <div class="text-center">
            <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
            <a href="{{ route('parceiros.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
          </div>
        </div>
      </div>
    {{ Form::close() }}
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
jQuery(function($){
  $('.js-example-basic-single').select2();
  $('#preco').mask('#.##0,00', {reverse: true});
});
</script>
@endsection
