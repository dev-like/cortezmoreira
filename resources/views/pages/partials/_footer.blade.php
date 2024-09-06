<!-- Rodapé -->
<div class="cilindro"></div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3">
              <h5>Unidade</h5>
              @if(isset($unidades))
                @foreach($unidades as $unidade)
                  <p>{{$unidade->rua}}, {{$unidade->numero}} - {{$unidade->bairro}}</p>
                @endforeach
              @endif
              <p>Imperatriz - MA</p>
            </div>

            <div class="col-sm-12 col-md-3">
              <h5>SAC</h5>

              @if(isset($empresa->telefone))
                @foreach($empresa->telefone as $empresa->telefone )
                  <p>{{ $empresa->telefone }}</p>
                @endforeach
              @endif

              @if(isset($empresa->whatsapp))
                <p>
                  <img class="aah" src="{{ asset('theme/imagens/whatsapp.png') }}" alt="Whatsapp">
                  {{$empresa->whatsapp}}
                </p>
              @endif

            </div>

            <div class="col-sm-12 col-md-3 redesocial">
              @if(isset($empresa->facebook))
                <a href="{{$empresa->facebook}}"> <img src="{{ asset('theme/imagens/facebook.png') }}" alt="facebook"></a>
              @endif
              @if(isset($empresa->instagram))
                <a href="{{$empresa->instagram}}"> <img src="{{ asset('theme/imagens/instagram.png') }}" alt="instagram"></a>
              @endif
            </div>

            <div class="col-sm-12 col-md-3 certificados">
              <div class="container">
                <div class="row justify-content-center">
                  <div class="img">
                    <img src="{{ asset('theme/imagens/pncq.png') }}" alt="certificado">
                  </div>
                  <div class="img">
                    <img src="{{ asset('theme/imagens/controllab.png') }}" alt="certificado">
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</footer>
