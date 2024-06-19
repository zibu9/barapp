@admin
<li class="nav-header user-panel pb-2 mb-2 d-flex" style="color: #4b646f;">GESTION BOISSON</li>
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
