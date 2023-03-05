@php
    $link = request()->segment(1);
@endphp
<div class="app-menu">
    <ul class="accordion-menu">
        <li class="sidebar-title">
            Menu
        </li>
        <li class="{{ $link == 'dashboard' ? 'active-page' : '' }}">
            <a href="." class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
        </li>
        <li class="{{ $link == 'kategori' ? 'active-page' : '' }}">
            <a href="./kategori" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Kategori</a>
        </li>
        <li class="{{ $link == 'vendor' ? 'active-page' : '' }}">
            <a href="./vendor" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Vendor</a>
        </li>
        <li class="{{ $link == 'pesanan' ? 'active-page' : '' }}">
            <a href="./pesanan" class="{{ $link == '' ? 'active' : ''}}"><i class="material-icons-two-tone">dashboard</i>Pesanan</a>
        </li>
    </ul>
</div>