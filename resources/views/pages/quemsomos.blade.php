@extends('pages.base')

@section('metatags')

@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('theme/css/quemsomos.css') }}">
@endsection

@section('body')

    <nav class="flutuar">
        @include('pages.partials._menu')
    </nav>

  <section id="quemsomos">
    <img src="{{ asset('theme/imagens/bg-1.png') }}" alt="" class="bg-1">
    <div class="container">
        @include('pages.partials._links')
      <div class="row">

        <div class="col-md-6">
          <h1>Quem somos</h1>

          @if(isset($quemsomos->texto))
            {!! $quemsomos->texto !!}
          @endif

        </div>

        <div class="col-md-6">
          @if(isset($quemsomos->imagem))
            <div class="foto" style="background-image:url('uploads/quemsomos/{{$quemsomos->imagem}}');"></div>
          @endif
        </div>

      </div>
    </div>

    <div class="container valores">
      <div class="row">

        <div class="col-md-4">
          <h2>Missão</h2>
          @if(isset($empresa->missao))
            <p>
              {{ $empresa->missao }}
            </p>
          @endif
        </div>

        <div class="col-md-4">
          <h2>Visão</h2>
          @if(isset($empresa->visao))
            <p>
              {{ $empresa->visao }}
            </p>
          @endif
        </div>

        <div class="col-md-4">
          <h2>Valores</h2>
          @if(isset($empresa->valores))
            <p>
              {{ $empresa->valores }}
            </p>
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
