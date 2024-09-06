@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-caminho')
Empresa
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
      @if(!isset($empresa->id))
        <p id="req-cad">
          As informações da empresa ainda não foram cadastradas,
          <a id="cad" class="text-success" href="#"> Cadastre agora.</a>
        </p>
        <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
          {{ Form::open(['route' => 'empresa.store']) }}
      @else
          <div id="form-cad" class="col-sm-12 col-xs-12">
          {{ Form::model($empresa, ['route' => ['empresa.update', $empresa->id], 'method' => 'PUT']) }}
      @endif

      <div class="row">
        <div class="form-group col-md-5">
            {{ Form::label('nomefantasia', 'Nome Fantasia') }}
            {{ Form::text('nomefantasia', null, array('class' => 'form-control', 'autofocus','maxlength' => '255', 'required')) }}
        </div>
        <div class="form-group col-md-5">
            {{ Form::label('telefone', 'Telefones') }}
            {{ Form::text('telefone', null, array('class' => 'form-control','data-role' => 'tagsinput','maxlength' => '150','required')) }}
        </div>
        <div class="form-group col-md-2">
            {{ Form::label('whatsapp', 'Whatsapp') }}
            {{ Form::text('whatsapp', null, array('class' => 'form-control','maxlength' => '150','required')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-8">
            {{ Form::label('endereco', 'Endereço') }}
            {{ Form::text('endereco', null, array('class' => 'form-control','maxlength' => '255','required')) }}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, array('class' => 'form-control','maxlength' => '50','required')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('instagram', 'Instagram') }}
            {{ Form::url('instagram', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('facebook', 'Facebook') }}
            {{ Form::url('facebook', null, array('class' => 'form-control','maxlength' => '250')) }}
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-4">
          {{ Form::label('missao', 'Missão') }}
          {{ Form::textarea('missao',null, array('class' => 'form-control','maxlength'=>850,'required' ))}}
        </div>
        <div class="form-group col-md-4">
          {{ Form::label('visao', 'Visão') }}
          {{ Form::textarea('visao',null, array('class' => 'form-control','maxlength'=>850,'required' ))}}
        </div>
        <div class="form-group col-md-4">
          {{ Form::label('valores', 'Valores') }}
          {{ Form::textarea('valores',null, array('class' => 'form-control','maxlength'=>850,'required' ))}}
        </div>
      </div>

      <div class="row" style="margin-top: 20px">
        <div class="col-12">
          <div class="text-center">
            <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
            <a href="{{ route('empresa.index') }}" class="btn btn-danger"><i class="dripicons-cross"></i> Cancelar</a>
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
<script src="{{ asset('template/plugins/tinymce/tinymce.min.js') }}"></script>
<script>
jQuery(function($){
  $("#telefone").mask("(99) 99999-9999");
  $("#whatsapp").mask("(99) 99999-9999");
});
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
  });
</script>

@endsection
