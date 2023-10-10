<section id="content">
    @include('backend.includes.navbar')
    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                {{-- <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span> --}}
            </a>
        </div>

        <ul class="box-info">
            <a href="{{ route('Daftar Komoditas') }}">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h3>{{ $response['companies']['count'] }}</h3>
                        <p>Jumlah Komoditas yang Tercatat pada IDX</p>

                    </span>

                </li>
            </a>
            <li>
                <i class='bx bx-trending-up'></i>
                <span class="text">
                    <h3>{{ $response['top_gainers']['count'] }}</h3>
                    <p>Top Gainers</p>
                </span>
            </li>
            <li>
                <i class='bx bx-trending-down'></i>
                <span class="text">
                    <h3>{{ $response['top_losers']['count'] }}</h3>
                    <p>Top topLosers</p>
                </span>
            </li>
        </ul>
        <ul class="box-info">
            <a href="{{ route('Sortir-Saham') }}">
                <li>
                    <i class="bx bx-list-ul"></i>
                    <span class="text">
                        <h3>{{ $sortirData }}</h3>
                        <p>Jumlah List Sortir Saham</p>
                    </span>
                </li>
            </a>
            <a href="{{ route('Sortir-Saham') }}">
                <li>
                    <i class="bx bx-sort"></i>
                    <span class="text">
                        <h3>{{ $hasilSortir }}</h3>
                        <p>List Saham yang tersortir</p>
                    </span>
                </li>
            </a>
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Trend 5 Teratas (Volume)</h3>
                    {{-- <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i> --}}
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Ticker</th>
                            <th>close</th>
                            <th>Satuan</th>
                            <th>Persen</th>
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
        <div class="todo">
            <div class="head">

                <h3>Top 5 Perubahan Harga Terendah</h3>
                {{-- <i class='bx bx-plus'></i>
                <i class='bx bx-filter'></i> --}}
            </div>
            <ul class="todo-list">
                @foreach ($response['top_losers']['results'] as $topLoser)
                    @if ($loop->iteration <= 5)
                        <li class="not-completed">
                            <p><strong>
                                    {{ $topLoser['ticker'] }}
                                </strong>
                                <br>
                                CLose Rp {{ $topLoser['close'] }}
                                <br>
                                {{ number_format($topLoser['percent'], 5) }} %
                            </p>
                            <div class="head-title">
                                <a href="{{ route('Sortir Saham', ['ticker' => $topLoser['ticker']]) }}"
                                    class="btn-download">
                                    <i class='bx bx-add-to-queue'></i>
                                </a>
                            </div>
                        </li>
                    @else
                    @break
                @endif
            @endforeach
        </ul>
    </div>
    <div class="todo">
        <div class="head">
            <h3>Top 5 Perubahan Harga Tertinggi</h3>
            {{-- <i class='bx bx-plus'></i>
            <i class='bx bx-filter'></i> --}}
        </div>
        <ul class="todo-list">
            @foreach ($response['top_gainers']['results'] as $topGainer)
                @if ($loop->iteration <= 5)
                    <li class="completed">
                        <p><strong>
                                <a
                                    href="{{ route('cari-saham', ['symbol' => $topGainer['ticker'] . '.JK', 'interval_option' => '5m', 'range_option' => '1d']) }}">
                                    {{ $topGainer['ticker'] }}
                                </a>
                            </strong>
                            <br>
                            CLose Rp {{ $topGainer['close'] }}
                            <br>
                            {{ number_format($topGainer['percent'], 5) }} %
                        </p>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                @else
                @break
            @endif
        @endforeach
    </ul>
</div>
</div>
</main>
<!-- MAIN -->
</section>
<!-- ... Konten HTML sebelumnya ... -->

{{-- <script>
    // Memulai pengukuran waktu respons API
    console.time('apiResponseTime');

    // Lakukan permintaan API ke URL yang sesuai
    fetch('https://api.goapi.id/v1/stock/idx/trending', {
            headers: {
                'accept': 'application/json',
                'X-API-KEY': 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',
            }
        })
        .then(response => response.json())
        .then(data => {
            // Akhiri pengukuran waktu respons API
            console.timeEnd('apiResponseTime');

            // Tampilkan hasil waktu respons API di halaman
            const responseTimeElement = document.getElementById('apiResponseTime');
            responseTimeElement.textContent = 'Waktu respons API (Trending): ' + data.execution_time.toFixed(2) +
                ' detik';
        })
        .catch(error => {
            console.error(error);
            // Akhiri pengukuran waktu respons API (jika terjadi kesalahan)
            console.timeEnd('apiResponseTime');
        });
</script>

<!-- Lakukan hal yang serupa untuk tiga endpoint API lainnya -->
<script>
    // Memulai pengukuran waktu respons API
    console.time('apiResponseTime2');

    // Lakukan permintaan API ke URL yang sesuai
    fetch('https://api.goapi.id/v1/stock/idx/companies', {
            headers: {
                'accept': 'application/json',
                'X-API-KEY': 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',
            }
        })
        .then(response => response.json())
        .then(data => {
            // Akhiri pengukuran waktu respons API
            console.timeEnd('apiResponseTime2');

            // Tampilkan hasil waktu respons API di halaman
            const responseTimeElement = document.getElementById('apiResponseTime2');
            responseTimeElement.textContent = 'Waktu respons API (Companies): ' + data.execution_time.toFixed(2) +
                ' detik';
        })
        .catch(error => {
            console.error(error);
            // Akhiri pengukuran waktu respons API (jika terjadi kesalahan)
            console.timeEnd('apiResponseTime2');
        });
</script>

<script>
    // Memulai pengukuran waktu respons API
    console.time('apiResponseTime3');

    // Lakukan permintaan API ke URL yang sesuai
    fetch('https://api.goapi.id/v1/stock/idx/top_loser', {
            headers: {
                'accept': 'application/json',
                'X-API-KEY': 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',
            }
        })
        .then(response => response.json())
        .then(data => {
            // Akhiri pengukuran waktu respons API
            console.timeEnd('apiResponseTime3');

            // Tampilkan hasil waktu respons API di halaman
            const responseTimeElement = document.getElementById('apiResponseTime3');
            responseTimeElement.textContent = 'Waktu respons API (Top Loser): ' + data.execution_time.toFixed(2) +
                ' detik';
        })
        .catch(error => {
            console.error(error);
            // Akhiri pengukuran waktu respons API (jika terjadi kesalahan)
            console.timeEnd('apiResponseTime3');
        });
</script>

<script>
    // Memulai pengukuran waktu respons API
    console.time('apiResponseTime4');

    // Lakukan permintaan API ke URL yang sesuai
    fetch('https://api.goapi.id/v1/stock/idx/top_gainer', {
            headers: {
                'accept': 'application/json',
                'X-API-KEY': 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',
            }
        })
        .then(response => response.json())
        .then(data => {
            // Akhiri pengukuran waktu respons API
            console.timeEnd('apiResponseTime4');

            // Tampilkan hasil waktu respons API di halaman
            const responseTimeElement = document.getElementById('apiResponseTime4');
            responseTimeElement.textContent = 'Waktu respons API (Top Gainer): ' + data.execution_time.toFixed(2) +
                ' detik';
        })
        .catch(error => {
            console.error(error);
            // Akhiri pengukuran waktu respons API (jika terjadi kesalahan)
            console.timeEnd('apiResponseTime4');
        });
</script> --}}

<!-- ... Konten HTML setelahnya ... -->
