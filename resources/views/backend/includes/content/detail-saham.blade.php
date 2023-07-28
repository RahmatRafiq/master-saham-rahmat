<section id="content">
    @include('backend.includes.navbar')
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Detail Saham</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li>
                        <i class='bx bx-chevron-right'>
                        </i>
                    </li>
                    <li>
                        <a class="active" href="#">Detail Saham</a>
                    </li>
                    <li>
                        <i class='bx bx-chevron-right'>
                        </i>
                    </li>
                    <li>
                        <a class="active" href="#">Ticker</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>
        <br>
        <div>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Cari Berdasarkan Ticker...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
        </div>
        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3>BBCA</h3>
                    <p>Kode Ticker</p>

                </span>
            </li>
            <li>
                <i class='bx bx-trending-up'></i>
                <span class="text">
                    <h3>{{ $response['top_gainers']['count'] }}</h3>
                    <p>Harga Tertinggi</p>
                </span>
            </li>
            <li>
                <i class='bx bx-trending-down'></i>
                <span class="text">
                    <h3>{{ $response['top_losers']['count'] }}</h3>
                    <p>Harga Terendah</p>
                </span>
            </li>
        </ul>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Riwayat Harga </h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Waktu HH-BB-TTT (JJ:MM)</th>
                            <th>Harga Buka</th>
                            <th>Harga Tertinggi</th>
                            <th>Harga Tutup</th>
                            <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($response['trending']['results'] as $result)
                            @if ($loop->iteration <= 9)
                                <tr>
                                    <td><strong>{{ $result['ticker'] }}</strong></td>
                                    <td> Rp {{ $result['close'] }}</td>
                                    <td>
                                        Perlembar
                                    </td>
                                    <td
                                        class="{{ $result['percent'] < 0 ? 'negative-percent' : ($result['percent'] > 0 ? 'positive-percent' : '') }}">
                                        {{ number_format($result['percent'], 5) }} %
                                    </td>
                                </tr>
                            @else
                            @break
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
<!-- MAIN -->
</section>
