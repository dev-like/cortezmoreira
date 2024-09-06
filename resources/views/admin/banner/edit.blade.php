  @extends('admin.main')

@section('page-title')
Editar Banner
@endsection

@section('page-caminho')
Banners
@endsection

@section('content')
<div class="col-12">
  <div class="card-box">
        {{ Form::model($banners, ['route' => ['banners.update', $banners->id], 'method' => 'PUT', 'files' => true]) }}
              <div class="row">
                <div class="form-group col-md-6">
                  {{ Form::label('caminho','Imagem') }}
                  <input type="file" name="caminho" class="filestyle" data-buttonText="Carregar" data-placeholder="{!! $banners->caminho !!}" data-btnClass="btn-light">
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
                  {{ Form::label('texto', 'Texto') }}
                  {{ Form::text('texto', null, array('class' => 'form-control', 'autofocus','maxlength' => '255')) }}
                </div>
              </div>


            <div class="row" style="margin-top: 20px">
            <div class="form-group col-12">
              <div class="text-center">
                <button class="btn btn-success" type="submit" value="Salvar"><i class="fa fa-save m-r-5"></i> Salvar</button>
                <a href="{{ route('banners.index') }}" class="btn btn-danger"><i class="fa fa-window-close m-r-5"></i> Cancelar</a>
              </div>
            </div>
          </div>
        {{ Form::close() }}
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('template/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}" type="text/javascript"></script>
<script>

$(document).ready(function () {
    $("#cad").click(function(event){
      event.preventDefault();
      $("#req-cad").slideUp();
      $("#form-cad").slideDown();
    });
  });

</script>
@endsection
