@extends('admin.main')

@section('styles')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Sweet Alert css -->
  <link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-caminho')
Quem Somos
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
      @if(!isset($quemsomos->id))
        <p id="req-cad">
          As informações de Quem Somos ainda não foi cadastrada,
          <a id="cad" class="text-success" href="#"> Cadastre agora.</a>
        </p>
        <div id="form-cad" class="col-sm-12 col-xs-12" style="display:none">
          {{ Form::open(['route' => 'quemsomos.store','files' => true]) }}
      @else
          <div id="form-cad" class="col-sm-12 col-xs-12">
          {{ Form::model($quemsomos, ['route' => ['quemsomos.update', $quemsomos->id], 'method' => 'PUT','files' => true]) }}
      @endif

      <div class="row">
        <div class="form-group col-md-12">
          {!! Form::label('imagem', 'Cadastrar Imagem') !!}

          @if($quemsomos->imagem != NULL)
            <input type="file" name="imagem" class="filestyle" data-placeholder="{{$quemsomos->imagem}}" data-btnClass="btn-light">
          @else
          <input type="file" name="imagem" class="filestyle" data-placeholder="Enviar Imagem" data-btnClass="btn-light" required>
          @endif

        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          {{ Form::label('texto', 'Quem Somos') }}
          {{ Form::textarea('texto', null, array('class' => 'form-control')) }}
        </div>
      </div>

      <div class="row" style="margin-top: 20px">
        <div class="col-12">
          <div class="text-center">
            <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Atualizar</button>
            <a href="{{ route('quemsomos.index') }}" class="btn btn-danger"><i class="dripicons-cross"></i> Cancelar</a>
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
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('template/plugins/ckeditor5/ckeditor.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
});

ClassicEditor
  .create( document.querySelector('#texto'), {
  } )
  .then( editor => {
    window.editor = editor;
  } )
  .catch( err => {
    console.error( err.stack );
  } );

</script>

@endsection
