@manager
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="fas fa-dumpster"></i>
        <p>
            Transactions
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
        <a href="{{ route('manager.transactions.create') }}" class="nav-link">
            <i class="fa fa-plus nav-icon"></i>
            <p>Nouveau
            <span class="badge badge-success right">New</span>
            </p>
        </a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fas fa-list nav-icon"></i>
            <p>Liste
            <span class="badge badge-success right">All</span>
            </p>
        </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link{{ request()->routeIs('admin.results') ? ' active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>
            Nos Resultats
        </p>
    </a>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link{{ request()->routeIs('admin.details') ? ' active' : '' }}">
        <i class="nav-icon fas fa-chart-bar"></i>
        <p>
            Details
        </p>
    </a>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link{{ request()->routeIs('admin.toExcel') ? ' active' : '' }}">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
            Exportation Excel
        </p>
    </a>
</li>
@endmanager
