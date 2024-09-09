<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="Salon Mr.ABB" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ auth()->user()->role->content }} Bar</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @include('layouts.partials.sidebar.admin')

        @if ((auth()->user()->role->id == 2))
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                    Temoins
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="{{ route('observer.create') }}" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                        <i class="fa fa-plus nav-icon"></i>
                        <p>Nouveau
                        <span class="badge badge-success right">New</span>
                        </p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('observer.index') }}" class="nav-link{{ request()->routeIs('observer.index') ? ' active' : '' }}">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Liste
                        <span class="badge badge-success right">All</span>
                        </p>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{ route('admin.results') }}" class="nav-link{{ request()->routeIs('admin.results') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-list"></i>
                    <p>
                        Nos Resultats
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{ route('admin.details') }}" class="nav-link{{ request()->routeIs('admin.details') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-chart-bar"></i>
                    <p>
                        Details
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview">
                <a href="{{ route('admin.toExcel') }}" class="nav-link{{ request()->routeIs('admin.toExcel') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                        Exportation Excel
                    </p>
                </a>
            </li>
        @endif

        @if ((auth()->user()->role->id == 3))
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                <i class="nav-icon fas fa-vote-yea"></i>
                <p>
                Résultats
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{ route('result.create') }}" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Ajouter
                    <span class="badge badge-success right">New</span>
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ route('result.index') }}" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Liste
                    <span class="badge badge-success right">All</span>
                    </p>
                </a>
                </li>
            </ul>
            </li>
        @endif

         {{-- <li class="nav-header">Divers</li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Circonscriptions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Nouveau
                    <span class="badge badge-success right">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste
                    <span class="badge badge-success right">All</span>
                  </p>
                </a>
              </li>
            </ul>
          </li> --}}
{{--
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Profession
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('professions.create') }}" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Nouveau
                    <span class="badge badge-success right">New</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('professions.index') }}" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
                  <i class="fas fa-list nav-icon"></i>
                  <p>Liste
                    <span class="badge badge-success right">All</span>
                  </p>
                </a>
              </li>
            </ul>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
