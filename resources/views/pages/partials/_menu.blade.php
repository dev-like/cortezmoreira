<!-- Menu de Navegação -->
    <div class="container">
        <div id="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <a href="/" class="logo">
          <img src="{{ asset('theme/imagens/logo_sm.png') }}" alt="logo_lab">
        </a>

        <ul class="menu">
            <li class="{{$empresa->page=='quemsomos'?'current':''}}"><a href="{{url('quemsomos')}}">QUEM SOMOS</a></li>
            <li class="{{$empresa->page=='corpoclinico'?'current':''}}"><a href="{{url('corpoclinico')}}">CORPO CLÍNICO</a></li>
            <li class="{{$empresa->page=='convenios'?'current':''}}"><a href="{{url('convenios')}}">CONVÊNIOS</a></li>
        </ul>

        <ul class="menu-mobile">
            <li class="{{$empresa->page=='quemsomos'?'current':''}}"><a href="{{url('quemsomos')}}">QUEM SOMOS</a></li>
            <li class="{{$empresa->page=='corpoclinico'?'current':''}}"><a href="{{url('corpoclinico')}}">CORPO CLÍNICO</a></li>
            <li class="{{$empresa->page=='convenios'?'current':''}}"><a href="{{url('convenios')}}">CONVÊNIOS</a></li>
            <span>SAC</span>
            <p>(99)3525-0099</p>
            <div class="rdsocial">
                <a href="{{$empresa->facebook}}"> <img src="{{ asset('theme/imagens/facebook-w.png') }}" alt="facebook"></a>
                <a href="{{$empresa->instagram}}"> <img src="{{ asset('theme/imagens/instagram-w.png') }}" alt="instagram"></a>
            </div>
        </ul>

        <div class="links">
          @if(isset($infosite->resultado_exame))
            <a href="http://189.90.47.85:9090/auth" class="resultados">Resultado de Exames</a>
          @endif
              <div class="duvidas">
                Dúvidas? Fale Conosco!
                <div class="opcoes">
                    <a href="tel:+559935243600">
                        <img src="{{ asset('theme/imagens/phone-call.png') }}" alt="telefone">
                        (99)3524-3600
                    </a>
                    <a href="tel:+5599991020416">
                        <img src="{{ asset('theme/imagens/cell-call.png') }}" alt="telefone">
                        (99)99102-0416
                    </a>
                    <a href="tel:+5599991020416">
                        <img src="{{ asset('theme/imagens/whatsapp.png') }}" alt="telefone">
                        (99)99102-0416
                    </a>
                </div>
            </div>
        </div>

    </div>
