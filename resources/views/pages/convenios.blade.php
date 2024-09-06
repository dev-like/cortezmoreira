@extends('pages.base')

@section('metatags')

@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('theme/css/convenios.css') }}">
@endsection

@section('body')

  <nav class="flutuar">
    @include('pages.partials._menu')
  </nav>

  <section id="convenios">
      @include('pages.partials._links')
    <div class="container">
      <h1>Convênios</h1>
      <p class="subtexto">Descubra se o Cortez Moreira atende ao seu convênio</p>

      <div class="row">
        @if(isset($convenios))
          <div class="col-md-6">
            <div class="cx-subtitulo">
              <p class="subtitulo">LISTA DE CONVÊNIOS</p>
              @foreach($convenios as $convenio)
                <li>{{$convenio->descricao}}</li>
              @endforeach
            </div>
          </div>
        @endif

        <div class="col-md-6 informacoes">
          <h5>Atenção!</h5>
          <p>Fique atento à documentação necessária para a realização dos seus exames:</p>

          <strong>PLANOS INDIVIDUAIS</strong>
          <p>Apresentação do RG, Comprovante de pagamento e Carteirinha do Convênio.</p>

          <strong>PLANOS EMPRESARIAIS</strong>
          <p>Apresentação do RG e Carteirinha do Convênio.</p>

          <h5>Dúvidas?</h5>
          <p>Ligue no nosso Serviço de Atendimento ao Cliente (SAC), (99)3524-3600 e fale conosco! Estaremos disponíveis para te ajudar</p>

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
