<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-5">
    <!-- Brand Logo -->
    <a href="{{asset('adminlte')}}/index3.html" class="brand-link">
      <img src="{{asset('images')}}/icono.png"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ __('App name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div>
          @guest
          @else
            <i class="nav-icon fas fa-user fa-2x"></i>
          @endguest
        </div>
        <div class="info w-100">
          <div class="mx-auto">
            @guest
              <a class="btn btn-outline-primary btn-sm btn-block" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
            @else
              {{ Auth::user()->name }}
              <div class="float-right">
                <a class="btn btn-outline-primary btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    Salir
                </a>
              </div>
              <form id="logout-form" action="{{ route('logout') }}" method="POST"
                  style="display: none;">
                  @csrf
              </form>
            @endguest
            </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview {{($activePage == 'gigruinv'|| $activePage == 'gisemill' || $activePage == 'gilininv') ? ' menu-open' : ''}} ">
            <a href="#" class="nav-link {{ ($activePage == 'gigruinv' || $activePage == 'gisemill' || $activePage == 'gilininv') ? ' active' : '' }}">
              <i class="nav-icon fas fa-flask"></i>
              <p>
                {{ __('gigruinv') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('gigruinv.index') }}"" class="nav-link{{ $activePage == 'gigruinv' ? ' active' : '' }}">
                  <i class="nav-icon fas fa-flask"></i>
                  <p>{{ __('gigruinv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gisemill.index') }}"" class="nav-link{{ $activePage == 'gisemill' ? ' active' : '' }}">
                  <i class="fab fa-pagelines"></i>
                  <p>{{ __('gisemill') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gilininv.index') }}"" class="nav-link{{ $activePage == 'gilininv' ? ' active' : '' }}">
                  <i class="fas fa-bezier-curve"></i>
                  <p>{{ __('gilininv') }}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{($activePage == 'giproinv'|| $activePage == 'gilinpro' ) ? ' menu-open' : ''}} ">
            <a href="#" class="nav-link {{ ($activePage == 'giproinv' || $activePage == 'gilinpro' ) ? ' active' : '' }}">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                {{ __('proyectos') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('giproinv.index') }}"" class="nav-link{{ $activePage == 'giproinv' ? ' active' : '' }}">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>{{ __('giproinv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gilinpro.index') }}"" class="nav-link{{ $activePage == 'gilinpro' ? ' active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('gilinpro') }}</p>
                  <span class="right badge badge-danger">Ojo</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('giinvest.index') }}"" class="nav-link{{ $activePage == 'giinvest' ? ' active' : '' }}">
              <i class="fas fa-user-tie nav-icon"></i>
              <p>{{ __('giinvest') }}</p>
            </a>
          </li>
          <li class="nav-item has-treeview {{($activePage == 'giseminv'|| $activePage == 'gicapsem' ) ? ' menu-open' : ''}} ">
            <a href="#" class="nav-link {{ ($activePage == 'giseminv' || $activePage == 'gicapsem') ? ' active' : '' }}">
              <i class="nav-icon fas fa-seedling"></i>
              <p>
                {{ __('giseminv') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('giseminv.index') }}"" class="nav-link{{ $activePage == 'giseminv' ? ' active' : '' }}">
                  <i class="fas fa-seedling nav-icon"></i>
                  <p>{{ __('giseminv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gicapsem.index') }}"" class="nav-link{{ $activePage == 'gicapsem' ? ' active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('gicapsem') }}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{($activePage == 'giartinv'|| $activePage == 'gilibinv' || $activePage == 'gipatinv' || $activePage == 'giponinv' || $activePage == 'gisofinv' ) ? ' menu-open' : ''}} ">
            <a href="#" class="nav-link {{ ($activePage == 'giartinv' || $activePage == 'gilibinv' || $activePage == 'gipatinv' || $activePage == 'giponinv' || $activePage == 'gisofinv') ? ' active' : '' }}">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                {{ __('productos') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('giartinv.index') }}"" class="nav-link{{ $activePage == 'giartinv' ? ' active' : '' }}">
                  <i class="fas fa-book-open nav-icon"></i>
                  <p>{{ __('giartinv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gilibinv.index') }}"" class="nav-link{{ $activePage == 'gilibinv' ? ' active' : '' }}">
                  <i class="fas fa-book nav-icon"></i>
                  <p>{{ __('gilibinv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gipatinv.index') }}"" class="nav-link{{ $activePage == 'gipatinv' ? ' active' : '' }}">
                  <i class="fas fa-brain nav-icon"></i>
                  <p>{{ __('gipatinv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('giponinv.index') }}"" class="nav-link{{ $activePage == 'giponinv' ? ' active' : '' }}">
                  <i class="fas fa-comment nav-icon"></i>
                  <p>{{ __('giponinv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gisofinv.index') }}"" class="nav-link{{ $activePage == 'gisofinv' ? ' active' : '' }}">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>{{ __('gisofinv') }}</p>
                </a>
              </li>
            </ul>
          </li>
          @can('administrar-usuario')
            <hr>
            <li class="nav-item">
              <a href="{{ route('users.index') }}"" class="nav-link{{ $activePage == 'users' ? ' active' : '' }}">
                <i class="fas fa-users nav-icon"></i>
                <p>Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('girubpre.index') }}"" class="nav-link{{ $activePage == 'girubpre' ? ' active' : '' }}">
                    <i class="fas fa-money-bill-wave nav-icon"></i>
                    <p>Rubros Presupuestales</p>
                </a>
            </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
