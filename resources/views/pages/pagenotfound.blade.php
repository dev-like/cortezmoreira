@extends('pages.base')

@section('metatags')

@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('theme/css/pagenotfound.css') }}">
@endsection

@section('body')

  <nav class="flutuar">
    @include('pages.partials._menu')
  </nav>

  <section id="pagenotfound">
    <div class="container">
      <div class="col-md-12">
        <h1>Erro 404. Página não encontrada :(</h1>
        <p>A página que você tentou acessar está indisponível ou não existe.</p>
      </div>
    </div>
  </section>

  @include('pages.partials._footer')
@endsection

@section('script')
  <script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
  <script src="{{ asset('theme/js/lib/jquery.js') }}" charset="utf-8"></script>
@endsection
