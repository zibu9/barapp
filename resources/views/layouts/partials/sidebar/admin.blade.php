@admin
<li class="nav-header user-panel pb-2 mb-2 d-flex" style="color: #4b646f;">GESTION BOISSON</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link{{ request()->routeIs('admin.user.create') ? ' active' : '' }}">
        <i class="nav-icon fa fa-users"></i>
        <p>
        Utilisateurs
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{ route('admin.user.create') }}" class="nav-link{{ request()->routeIs('admin.user.create') ? ' active' : '' }}">
            <i class="fa fa-plus nav-icon"></i>
            <p>Ajouter
            <span class="badge badge-info right">New</span>
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="{{ route('admin.users.index') }}" class="nav-link{{ request()->routeIs('observer.create') ? ' active' : '' }}">
            <i class="fas fa-list nav-icon"></i>
            <p>Liste
            <span class="badge badge-warning right">All</span>
            </p>
        </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="{{ route('admin.products.index') }}" class="nav-link{{ request()->routeIs('admin.products.*') ? ' active' : '' }}">
        <i class="fas fa-glass-cheers"></i>
        <p>
        Boissons
        <span class="right badge badge-danger">Toute</span>
      </p>
    </a>
</li>
<li class="nav-item">
    <a href="" class="nav-link">
        <i class="fas fa-dumpster"></i>
        <p>
            Transactions
            <span class="right badge badge-success">E/S</span>
        </p>
    </a>
</li>
@endadmin
