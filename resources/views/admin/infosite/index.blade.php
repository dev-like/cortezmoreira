@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-caminho')
Informações do Site
@endsection

@section('page-title')
Cadastro
@endsection

@section('script-bottom')
<link href="{{ asset('template/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
      @if(!isset($infosite->id))
        <p id="req-cad">
          As informações para o site ainda não foram cadastradas,
          <a id="cad" class="text-success" href="#"> Cadastre agora.</a>
        </p>
        <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
          {{ Form::open(['route' => 'infosite.store']) }}
      @else
          <div id="form-cad" class="col-sm-12 col-xs-12">
          {{ Form::model($infosite, ['route' => ['infosite.update', $infosite->id], 'method' => 'PUT']) }}
      @endif

      <div class="row">
        <div class="form-group col-md-6">
          {{ Form::label('resultado_exame', 'Resultado de Exame') }}
          {{ Form::text('resultado_exame', null, array('class' => 'form-control', 'autofocus','maxlength' => '250', 'required')) }}
        </div>
        <div class="form-group col-md-6">
          {{ Form::label('link_exames', 'Link de Exame') }}
          {{ Form::text('link_exames', null, array('class' => 'form-control', 'autofocus','maxlength' => '150', 'required')) }}
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('sobre_titulo', 'Titulo do Sobre') }}
          {{ Form::text('sobre_titulo', null, array('class' => 'form-control', 'autofocus','maxlength' => '150', 'required')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('sobre_texto', 'Texto do Sobre') }}
          {{ Form::textarea('sobre_texto', null, array('class' => 'form-control', 'autofocus','maxlength' => '500')) }}
        </div>
      </div>

      <div class="row" style="margin-top: 20px">
        <div class="col-12">
          <div class="text-center">
            <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
            <a href="{{ route('infosite.index') }}" class="btn btn-danger"><i class="dripicons-cross"></i> Cancelar</a>
          </div>
        </div>
      </div>
  </div>
</div>

{{ Form::close() }}
  </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/ckeditor5/ckeditor.js')}}"></script>
<script>
jQuery(function($){
  $("#telefone").mask("(99) 99999-9999");
});

  $(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
});

ClassicEditor
  .create( document.querySelector('#sobre_texto'), {
  } )
  .then( editor => {
    window.editor = editor;
  } )
  .catch( err => {
    console.error( err.stack );
  } );
</script>


@endsection
