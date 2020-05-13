<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-5">
    <!-- Brand Logo -->
    <a href="{{asset('adminlte')}}/index3.html" class="brand-link">
      <img src="{{asset('adminlte')}}/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ __('App name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ ($activePage == 'gigruinv' || $activePage == 'gilininv') ? ' active' : '' }}">
              <i class="nav-icon fas fa-flask"></i>
              <p>
                {{ __('gigruinv') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item{{ $activePage == 'gigruinv' ? ' active' : '' }}">
                <a href="{{ route('gigruinv.index') }}"" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('gigruinv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{asset('adminlte')}}/index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ ($activePage == 'giproinv' || $activePage == 'gilinpro') ? ' active' : '' }}">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                {{ __('proyectos') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item{{ $activePage == 'giproinv' ? ' active' : '' }}">
                <a href="{{ route('giproinv.index') }}"" class="nav-link">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>{{ __('giproinv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gilinpro.index') }}"" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('gilinpro') }}</p>
                  <span class="right badge badge-danger">Ojo</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link {{ ($activePage == 'giseminv' || $activePage == 'gicapsem') ? ' active' : '' }}">
              <i class="nav-icon fas fa-child"></i>
              <p>
                {{ __('semilleros') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item{{ $activePage == 'gigruinv' ? ' active' : '' }}">
                <a href="{{ route('giseminv.index') }}"" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('giseminv') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gicapsem.index') }}"" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('gicapsem') }}</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>