<div class="links-corpo">
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
            @if(isset($empresa->whatsapp))
              <a href="tel:+{{$empresa->whatsapp}}">
                <img src="{{ asset('theme/imagens/whatsapp.png') }}" alt="whatsapp">
                {{$empresa->whatsapp}}
              </a>
            @endif
        </div>
    </div>
</div>
