@php
    $link = request()->segment(1);
@endphp
<div class="app-menu">
    <ul class="accordion-menu">
        <li class="sidebar-title">
            Menu
        </li>
        <li class="{{ $link == 'dashboard' ? 'active-page' : '' }}">
            <a href="{{ url('/admin') }}" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
        </li>
        <li class="{{ $link == 'kategori' ? 'active-page' : '' }}">
            <a href="{{ url('/admin/kategori') }}" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Kategori</a>
        </li>
        <li class="{{ $link == 'vendor' ? 'active-page' : '' }}">
            <a href="{{ url('/admin/vendor') }}" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Vendor</a>
        </li>
        <!-- <li class="{{ $link == 'user' ? 'active-page' : '' }}">
            <a href="{{ url('/admin/user') }}" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>User</a>
        </li>
        <li class="{{ $link == 'pesanan' ? 'active-page' : '' }}">
            <a href="{{ url('/admin/pesanan') }}" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Pesanan</a>
        </li> -->
    </ul>
</div>