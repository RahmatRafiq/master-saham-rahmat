<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">AdminHub</span>
    </a>
    <ul class="side-menu top">
        <li class="active">
            <a href="{{ Route('Dashboard') }}">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="active">
            <a href="{{ route('Daftar Komoditas') }}">
                <i class="bx bx-list-ul "style="font-weight: bold;"></i>
                <span class="text">Daftar Komoditas (Saham)</span>
            </a>
        </li>
        <li>
            <a href="{{ route('Detail Saham') }}">
                <i class='bx bxs-detail'></i>
                <span class="text">Detail Saham</span>
            </a>
        </li>
        <li>
            <a href="{{ route('Cari Saham') }}">
                <i class='bx bxs-message-dots'></i>
                <span class="text">Cari Saham</span>
            </a>
        </li>
        <li>
            <a href="{{ route('Sortir-Saham') }}">
                <i class="bx bx-sort" style="font-weight: bold;"></i>
                <span class="text">Sortir Saham</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="bx bx-sitemap"style="font-weight: bold;"></i>
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
