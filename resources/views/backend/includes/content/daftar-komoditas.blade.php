<section id="content">
    <!-- NAVBAR -->
    @include('backend.includes.navbar')
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        @if (session('success'))
            <div class="alert success">
                <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert error">
                <span class="closebtn" onclick="this.parentElement.style.display='none'">&times;</span>
                {{ session('error') }}
            </div>
        @endif
        <div class="head-title">

            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li>
                        <a class="active" href="#">Daftar Saham</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Daftar Saham</h3>
                    {{-- <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i> --}}
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Logo</th>
                            <th>Pergerakan</th>
                            <th>Harga Tutup</th>
                            <th>Selisih</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($response as $data)
                            <tr>
                                <td><strong>{{ $data['ticker'] }}</strong></td>
                                <td>
                                    <a
                                        href="{{ route('cari-saham', ['symbol' => $data['ticker'] . '.JK', 'interval_option' => '5m', 'range_option' => '1d', 'name' => $data['name']]) }}">
                                        {{ $data['name'] }}
                                    </a>
                                    <ul>
                                        <br>
                                        <div class="head-title">
                                            <a href="{{ route('Sortir Saham', ['ticker' => $data['ticker']]) }}"
                                                class="btn-download">
                                                <i class='bx bx-add-to-queue'></i>
                                                <span class="text">Tambah ke Sortir</span>
                                            </a>
                                        </div>
                                    </ul>
                                </td>
                                <td>
                                    <img src="{{ $data['logo'] }}" alt="Company Logo">
                                </td>
                                <td
                                    class="{{ $data['percent'] < 0 ? 'negative-percent' : ($data['percent'] > 0 ? 'positive-percent' : '') }}">
                                    {{ number_format($data['percent'], 10) }} %
                                </td>
                                <td>Rp {{ $data['close'] }}</td>
                                <td
                                    class="{{ $data['change'] < 0 ? 'negative-percent' : ($data['change'] > 0 ? 'positive-percent' : '') }}">
                                    Rp
                                    {{ number_format($data['change'], 5) }} %
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</section>
