@extends('pages.base')

@section('metatags')

@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('theme/css/agendamentos.css') }}">
@endsection

@section('body')

  <nav class="flutuar">
    @include('pages.partials._menu')
  </nav>

  <section id="agendamentos">
      @include('pages.partials._links')
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1>Agendamento de coleta.</h1>
            <p>Lorem ipsum dolor sit amet, consectetur.</p>

            <div class="formulario">
              <form class="" action="/" method="post">
                {{ csrf_field() }}

                <label for="nome">Nome</label>
                <input id="nome" name="nome" type="text" required>

                <label for="nome">Idade</label>
                <input id="nome" name="idade" type="text" required>

                <label for="nome">CPF</label>
                <input id="nome" name="cpf" type="text" required>

                <label for="nome">Endereço</label>
                <input id="nome" name="endereco" type="text" required>

                <label for="nome">WhatsApp</label>
                <input id="nome" name="telefone" type="text" required>

                <button type="submit" class="enviar">AGENDAR</button>

              </form>
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
