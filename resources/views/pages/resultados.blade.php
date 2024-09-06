@extends('pages.base')

@section('metatags')

@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('theme/css/resultados.css') }}">
@endsection

@section('body')

  <nav class="flutuar">
    @include('pages.partials._menu')
  </nav>

  <section id="resultados">
    <div class="container">

      <h1 class="resultados">Selecione o resultado que deseja verificar</h1>
      <p class="aviso">Devido a troca de sistema por um tempo determinado iremos disponibilizar dois canais para resultados. Qualquer dúvida entre em contato com o Laboratório Cortez Moreira.</p>
      <div class="row">
        <div class="col-md-6">
          <div class="resultado re1">
            <h2>Resultado Experience</h2>
            <p class="descricao">Resultados a partir de dia 18/02/2020.</p>
            <a href="http://189.90.47.85:9090/auth"><button type="button" name="button" class="btn1">CLIQUE AQUI</button></a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="resultado re2">
            <h2>Resultado Pleris</h2>
            <p class="descricao">Resultados anteriores ao dia 18/02/2020.</p>
            <a href="https://resultadosonline.pleres.net/Acesso/Acesso"><button type="button" name="button" class="btn2">CLIQUE AQUI</button></a>
          </div>
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
