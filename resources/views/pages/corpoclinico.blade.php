@extends('pages.base')

@section('metatags')

@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('theme/css/corpoclinico.css') }}">
@endsection

@section('body')

  <nav class="flutuar">
    @include('pages.partials._menu')
  </nav>

  <section id="corpoclinico">
    <div class="container">
        @include('pages.partials._links')
      <h1>Corpo Clínico</h1>
      <div class="row">
        <div class="col-md-12">
          @if(isset($clinicos))
            @foreach($clinicos as $clinico)
              <div class="col-md-3 cx-clinicos" style="background-image:url('uploads/corpoclinico/{{$clinico->imagem}}')">
                <div class="informacoes">
                  <p class="conselho">{{$clinico->crf}}</p>
                  <p class="nome">{{$clinico->nome}}</p>
                  <p class="area">{{$clinico->descricao}}</p>
                </div>
              </div>
            @endforeach
          @endif

        </div>
      </div>

    </div>

  </section>

  @include('pages.partials._footer')
@endsection

@section('script')
  <script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
  <script src="{{ asset('theme/js/lib/jquery.js') }}" charset="utf-8"></script>
@endsection
