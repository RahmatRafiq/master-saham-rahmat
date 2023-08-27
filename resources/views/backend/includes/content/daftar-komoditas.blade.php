<section id="content">
    <!-- NAVBAR -->
    @include('backend.includes.navbar')
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
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
            <a href="#" class="btn-download">
                <i class="bx bxs-cloud-download"></i>
                <span class="text">Download PDF</span>
            </a>
        </div>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Daftar Saham</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
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
                                <td>{{ $data['name'] }}</td>
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
                                <td>
                                    <a href="{{ route('Sortir Saham', ['ticker' => $data['ticker']]) }}"
                                        class="btn-add">
                                        <i class="bx bx-plus"></i>
                                        <span class="text">Tambah ke dalam sortir saham</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
