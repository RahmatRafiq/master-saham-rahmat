<section id="sidebar">
    <a href="{{ route('Dashboard') }}" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Master Saham</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ Route::currentRouteName() === 'Dashboard' ? 'active' : '' }}">
            <a href="{{ route('Dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'Daftar Komoditas' ? 'active' : '' }}">
            <a href="{{ route('Daftar Komoditas') }}">
                <i class="bx bx-list-ul" style="font-weight: bold;"></i>
                <span class="text">Daftar Komoditas (Saham)</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'Detail Saham' ? 'active' : '' }}">
            <a href="{{ route('Detail Saham') }}">
                <i class='bx bxs-detail'></i>
                <span class="text">Detail Saham</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'Cari Saham' ? 'active' : '' }}">
            <a href="{{ route('Cari Saham') }}">
                <i class="bx bx-search-alt-2" style="font-weight: bold;"></i>
                <span class="text">Cari Saham</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'Sortir-Saham' ? 'active' : '' }}">
            <a href="{{ route('Sortir-Saham') }}">
                <i class="bx bx-sort" style="font-weight: bold;"></i>
                <span class="text">Sortir Saham</span>
            </a>
        </li>
        <li class="{{ Route::currentRouteName() === 'Simulasi' ? 'active' : '' }}">
            <a href="#">
                <i class="bx bx-sitemap" style="font-weight: bold;"></i>
                <span class="text">Simulasi</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#">
                <i class='bx bxs-cog'></i>
                <span class="text">Settings</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
