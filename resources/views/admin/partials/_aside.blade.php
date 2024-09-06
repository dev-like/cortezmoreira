<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                  <a href="javascript: void(0);"><i class="fa fa-users"></i> <span> Empresa </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                      <li><a href="{{route('empresa.index')}}">Dados empresa</a></li>
                      <li><a href="{{route('quemsomos.index')}}">Quem Somos</a></li>
                      <li><a href="{{route('unidades.index')}}">Unidades</a></li>
                      <li><a href="{{route('infosite.index')}}">Informações do Site</a></li>
                    </ul>
                </li>
                <li>
                  <a href="{{ route('banners.index') }}">
                    <i class="dripicons-photo-group"></i> <span> Banners </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('corpoclinico.index') }}">
                    <i class="fa fa-user-md"></i> <span> Corpo Clínico </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('convenios.index') }}">
                    <i class="fa fa-handshake-o"></i> <span> Convênios </span>
                  </a>
                </li>
                <!-- <li>
                  <a href="{{ route('premios.index') }}">
                    <i class="fa fa-trophy"></i> <span> Prêmios </span>
                  </a>
                </li> -->
                <li>
                  <a href="{{ route('agendamentos') }}">
                    <i class="fa fa-calendar"></i> <span> Agendamentos </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('coletas') }}">
                    <i class="mdi mdi-truck-delivery"></i> <span> Coletas </span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('parceiros.index') }}">
                    <i class="fa fa-handshake-o"></i> <span> Parceiros </span>
                  </a>
                </li>
                @if(Auth::User()->nivel == 1)
                  <li>
                    <a href="{{ route('historico.index') }}">
                      <i class="dripicons-document"></i> <span> Histórico de Atividades </span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('usuario.index') }}">
                      <i class="fa fa-user"></i> <span> Usuários </span>
                    </a>
                  </li>
                @endif
            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
