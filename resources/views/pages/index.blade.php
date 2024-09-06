@extends('pages.base')

@section('metatags')

@endsection

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('theme/css/banner.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/lib/slick.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/lib/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/lib/bootstrap-form.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/form.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/lib/remodal.css') }}">
<link rel="stylesheet" href="{{ asset('theme/css/lib/remodal-default-theme.css') }}">
<link href="{{ asset('template/plugins/sweet-alert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('body')

<!-- @include('pages.partials._loader') -->

    <section id="banner" style="background-image:url({{ asset('theme/imagens/banner-1.jpg') }})">
        <div class="pelicula"></div>

        <!-- Lista dos banners -->
        @foreach($banners as $banner)
          <div class="container box-banner" @if($loop->first) style="display:block" @endif>
              <div class="left">
                  <h1>{{$banner->titulo}}</h1>
                  <p>
                    {{$banner->texto}}
                  </p>
              </div>
              @if($banner->caminho != NULL)
                <div class="right">
                    <!-- <figure style="background-image:url('uploads/banners/{{$banner->caminho}}')"></figure> -->
                </div>
              @endif
          </div>
        @endforeach

        <div class="nav-banner">
          @foreach($banners as $banner)
            @if($banner->caminho != NULL)
              <span data-img="background-image:url('uploads/banners/{{$banner->caminho}}')" class="{{ $loop->first ? 'active' : '' }}"></span>
            @else
              <span data-img="background-image:url({{ asset('theme/imagens/banner-1.jpg') }})" class="{{ $loop->first ? 'active' : '' }}"></span>
            @endif
          @endforeach
        </div>
        <!-- <div class="container box-banner">
            <div class="left">
                <figure style="background-image:url({{ asset('theme/imagens/banner-1.jpg') }})">
                </figure>
            </div>
            <div class="right">
                <h1>Uma família para cuidar da sua!</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua.
                </p>
            </div>
        </div>
        <div class="container box-banner">
            <div class="right">
                <h1>Equipe qualificada</h1>
                <p>
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>
        </div>
        <div class="container box-banner">
            <div class="left">
                <h1>Equipamentos de alto nível</h1>
                <p>
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>
            <div class="right">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/qXYD6_Sx2ag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div> -->



        <nav class="">
            <!-- Menu de Navegação -->
                <div class="container">
                    <a href="/" class="logo">
                      <img src="{{ asset('theme/imagens/logo_sm.png') }}" alt="logo_lab">
                    </a>

                    <ul class="menu">
                        <li class="{{$empresa->page=='quemsomos'?'current':''}}"><a href="{{url('quemsomos')}}">QUEM SOMOS</a></li>
                        <li class="{{$empresa->page=='corpoclinico'?'current':''}}"><a href="{{url('corpoclinico')}}">CORPO CLÍNICO</a></li>
                        <li class="{{$empresa->page=='convenios'?'current':''}}"><a href="{{url('convenios')}}">CONVÊNIOS</a></li>
                    </ul>

                    <div class="links">
                        @if(isset($infosite->link_exames))
                          <a href="{{$infosite->link_exames}}" class="resultados">Resultado de Exames</a>
                        @endif
                        <div class="duvidas">
                            Dúvidas? Fale Conosco!

                            <div class="opcoes">
                                <a href="tel:+559935243600">
                                    <img src="{{ asset('theme/imagens/phone-call.png') }}" alt="telefone">
                                    (99)3524-3600
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
                </div>
        </nav>
    </section>

    <nav class="flutuar exterior">
      @include('pages.partials._menu')
    </nav>

    <section id="sobre">
        <img src="{{ asset('theme/imagens/bg-2.png') }}" alt="" class="bg-2">
        <img src="{{ asset('theme/imagens/bg-3.png') }}" alt="" class="bg-3">
        <div class="container">
            @include('pages.partials._links')

          @if(isset($infosite->sobre_titulo))
            <h2>{{$infosite->sobre_titulo}}</h2>
          @endif
            <div class="row laboratorio">
                <div class="col-md-6">
                    @if(isset($infosite->sobre_texto))
                      <p>
                        {!! $infosite->sobre_texto !!}
                      </p>
                    @endif
                </div>
                <div class="col-md-6">
                    <h3>Tecnológico</h3>
                    <img src="{{ asset('theme/imagens/tecnologia.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>

    <div class="dna">
        <img src="{{ asset('theme/imagens/bg-1.png') }}" alt="" class="bg-1">
        <!-- <section id="premios">
            <div class="container">
                <h3><span>Premiado</span></h3>
                <div class="row">
                    <div class="col-12">
                        <p class="desc">
                          @if(isset($infosite->premios_texto))
                            {{$infosite->premios_texto}}
                          @endif
                        </p>
                    </div>
                </div>

                <div class="row">
                  @if(isset($premios))
                    <div class="col-12 premiacoes">
                      @foreach($premios as $premio)
                        <div class="img-premios">
                          <div class="teste" style="background-image:url('uploads/premio/{{$premio->imagem}}')">

                          </div>
                          <p class="teste">{{$premio->descricao}}</p>
                        </div>
                      @endforeach
                    </div>
                  @endif
                </div>
            </div>
        </section> -->


      <div class="remodal" data-remodal-id="agendamento">
        <button data-remodal-action="close" class="remodal-close"></button>
        <h1>Agende aqui a sua consulta</h1>
        <!-- {{ Form::open(['route' => 'cadastro.agendamento', 'files' => true]) }} -->
          <form action="/postMail" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="form-group col-sm-6 col-12 campos">
                <label for="nome">Digite seu nome completo: </label>
                <input type="text" class="form-control" name="nome" required>
              </div>
              <div class="form-group col-sm-6 col-12 campos">
                <label for="whats">WhatsApp: </label>
                <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="(xx) xxxx-xxxx" required>
              </div>
              <div class="form-group col-sm-6 col-12 campos">
                <label for="dia">Selecione o dia: </label>
                <input type="date" name="dia" id="dateofbirth" required>
              </div>
              <div class="form-group col-sm-6 col-12 campos">
                <label for="whats">Selecione o horario: </label>
                <select required name="horario" class="customSelect">
                  <option value="08:00:00">08h00</option>
                  <option value="08:30:00">08h30</option>
                  <option value="09:00:00">09h00</option>
                  <option value="09:30:00">09h30</option>
                </select>
              </div>

              <div class="form-group col-12 campos">
                <label for="dia">Foto do pedido de exame: </label>
                <input type="file" class="form-control" name="pedido" accept="image/*"/ required>
              </div>

            </div>
            <button type="submit" class="remodal-confirm">Agendar</button>
            <button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
          </form>
        <!-- {!! Form::close() !!} -->
      </div>

      <div class="remodal" data-remodal-id="coleta">
        <button data-remodal-action="close" class="remodal-close"></button>
        <h1>Agende aqui a sua coleta</h1>
        <p>Após o agendamento entraremos em contato para confirmação dos dados.</p>
        <!-- {{ Form::open(['route' => 'cadastro.coleta', 'files' => true]) }} -->
          <form action="/postMail2" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
              <div class="form-group col-sm-6 col-12 campos">
                <label for="nome">Digite seu nome completo: </label>
                <input type="text" class="form-control" name="nome" required>
              </div>
              <div class="form-group col-sm-6 col-12 campos">
                <label for="whats">WhatsApp: </label>
                <input type="text" name="whatsapp" class="form-control" id="whatsapp2" placeholder="(xx) xxxx-xxxx" required>
              </div>
              <div class="form-group col-sm-12 col-12 campos">
                <label for="nome">Digite seu endereço: </label>
                <input type="text" class="form-control" name="endereco" required placeholder="Rua xxxx - numero xx - bairro xxxxxx">
              </div>
              <div class="form-group col-sm-6 col-12 campos">
                <label for="dia">Selecione o dia: </label>
                <input type="date" name="dia" id="dateofbirth" required>
              </div>
              <div class="form-group col-sm-6 col-12 campos">
                <label for="whats">Selecione o horario: </label>
                <select required name="horario" class="customSelect">
                  <option value="05:00:00">05h00</option>
                  <option value="05:30:00">05h30</option>
                  <option value="06:00:00">06h00</option>
                </select>
              </div>

              <div class="form-group col-12 campos">
                <label for="dia">Foto do pedido de exame: </label>
                <input type="file" class="form-control" name="pedido" accept="image/*"/ required>
              </div>

            </div>
            <button type="submit" class="remodal-confirm">Agendar</button>
            <button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
          </form>
        <!-- {{ Form::close() }} -->
      </div>

      <section id="exames">
        <div class="container">
          <div class="row">
            <div class="col-md-6">

              <div class="col-12 consulta">
                <img src="{{asset('theme/imagens/calendario.png')}}" alt="Calendario">
                <h3>Agende seu exame e tenha tranquilidade</h3>
                <button type="button" name="button" class="btn-agendar"><a href="#agendamento">Clique aqui</a></button>
              </div>

              <div class="coleta">
                <img src="{{asset('theme/imagens/coleta.png')}}" alt="coleta">
                <h3>Agende sua coleta e espere no conforto de casa</h3>
                <button type="button" name="button" class="btn-agendar"><a href="#coleta">Clique aqui</a></button>
              </div>

            </div>

            <div class="col-md-6">
              <div class="exame">
                <div class="col-12">

                  <div class="col-sm-12 col-md-8">
                    <h3>Guia para exames</h3>
                    <p>
                      Tenha acesso rápido e fácil a informações cruciais, como: diagnóstico
                      diferencial, dicas para coletas e solicitações de exames laboratoriais.
                    </p>
                    <button type="button" name="button" class="btn-exame"><a href="{{$infosite->link_exames}}">Clique aqui</a></button>
                  </div>
                  <div class="col-4">
                    <img src="{{asset('theme/imagens/ficha.png')}}" alt="Fica Exame">
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </section>

      <section id="parceiro">
        <div class="container">
            <h2>Conheça melhor os nossos parceiros</h2>
            @if(isset($parceiros))
              <div class="row parceiros">
                @foreach($parceiros as $parceiro)
                  <div class="col-sm-6 col-lg-3">
                      <div class="tx-parceiros">
                          <div class="cx-parceiros" style="background-image: url('uploads/parceiro/{{$parceiro->imagem}}');"></div>
                          <p>
                            {{$parceiro->texto}}
                          </p>
                      </div>
                  </div>
                  @endforeach
              </div>
            @endif
        </div>
      </section>

      @include('pages.partials._footer')
    </div>
@endsection

@section('script')
  <script src="{{ asset('theme/js/main.js') }}" charset="utf-8"></script>
  <script src="{{ asset('theme/js/lib/jquery.js') }}" charset="utf-8"></script>
  <script src="{{ asset('theme/js/lib/slick.js') }}" charset="utf-8"></script>
  <script src="{{ asset('theme/js/lib/remodal.js') }}" charset="utf-8"></script>
  <script src="{{ asset('theme/js/lib/jquery.mask.js') }}" charset="utf-8"></script>
  <script src="{{ asset('theme/js/lib/owl.carousel.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('theme/js/banner.js') }}" charset="utf-8"></script>
  <script src="{{ asset('template/plugins/sweet-alert/sweetalert2.min.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
    //   Script do Banner
    $(document).ready(function(){
        $('.nav-banner span').click(function(){
            $('.box-banner').removeAttr('style');
            $('.nav-banner span').removeClass('active');
            $(this).addClass('active');
            $('.box-banner').eq($(this).index()).fadeIn(500);
            $('section#banner').attr('style',$(this).attr('data-img'));
        });
    });
  </script>

  <script type="text/javascript">
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';

    if (exist){
    swal(
        {
          title: 'Agendamento realizado com Sucesso!',
          text: '{{Session::get('alert')}}',
          type: 'success',
          confirmButtonColor: '#008000'
        }
      )
    }

    var msg = '{{Session::get('alert2')}}';
    var exist = '{{Session::has('alert2')}}';
    if (exist){
    swal(
        {
          title: 'Pedido de coleta realizado com sucesso!',
          text: '{{Session::get('alert2')}}',
          type: 'success',
          confirmButtonColor: '#008000'
        }
      )
    }
    // Funcionalidades do Menu
    $(window).scroll(function()
    {
      if($(this).scrollTop() > $('section#banner').height()-$('section#banner nav').height())
          $('section#banner nav').addClass('flutuar');
      else
          $('section#banner nav').removeClass('flutuar');
    });

    jQuery(function($){
      $("#whatsapp").mask("(99) 99999-9999");
      $("#whatsapp2").mask("(99) 99999-9999");
    });

    $(document).ready(function(){

        $('section#parceiro .cx-parceiros').click(function(){
            $(this).siblings('p').slideToggle('fast');
        });

          $('.premiacoes').slick({
            autoplay: true,
            infinite: true,
            dots: true,
            arrows: false,
            slidesToShow: 5,
            slidesToScroll: 5,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  dots: true
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  dots: true

                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  dots: true
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
          }
        );

    });

    $(document).ready(function(){

      function mostrarBanner(indice){
        clearInterval(executar);
          // if(mouse) return;
          $('.carousel-banner .item-carousel').css({'opacity':'0','z-index':'0'});
          $('.carousel-banner .item-carousel').eq(banner).css({'opacity':'1','z-index':'1'});

          var pausar = false

            executar = setInterval(function() {
              if (pausar) return
              $('.carousel-banner .next').trigger('click');
            }, 7000);

            $('#banner').hover(function() {
              pausar = true
            }, function() {
              pausar = false
            });

      }
      var executar = setInterval(function(){ $('.carousel-banner .next').trigger('click'); }, 7000);
      var banner = 0;
      mostrarBanner(banner);

      $('.carousel-banner .prev').click(function(){
          mouse = false;
          banner = (banner == 0) ? $('.carousel-banner .item-carousel').length-1 : banner-1;
      mostrarBanner(banner);
      });

      $('.carousel-banner .next').click(function(){
          mouse = false;
          banner = ($('.carousel-banner .item-carousel').length-1 > banner) ? banner+1 : 0;
      mostrarBanner(banner);
      });
    });
</script>
@endsection
