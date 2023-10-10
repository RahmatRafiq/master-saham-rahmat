<section id="content">
    <div class="navbar">
        @include('backend.includes.navbar')
    </div>
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
                    <li><a href="#">Dashboard</a></li>
                    <li><i class="bx bx-chevron-right"></i></li>
                    <li><a class="active" href="#">Cari Saham</a></li>
                </ul>
                {{-- </div>
            <a href="#" class="btn-download">
                <i class="bx bxs-cloud-download"></i>
                <span class="text">Download PDF</span>
            </a>
        </div> --}}

                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Cari Saham</h3>
                        </div>
                        <form action="{{ route('cari-saham') }}" method="POST" id="cari-saham-form">
                            @csrf
                            <div class="form-input1">
                                <label for="symbol">Symbol atau Ticker</label>
                                <input type="text" name="symbol" id="symbol"
                                    placeholder="Masukkan 4 Karakter saham, Contoh, BRI dengan BBRI.jk"
                                    value="{{ request('symbol') }}">

                            </div>
                            <div class="form-input1">
                                <label for="interval_option">Interval</label>
                                <select class="form-select" name="interval_option" id="interval_option"
                                    style="margin-left: 50px;">
                                    <option value="1m"{{ request('interval_option') == '1m' ? ' selected' : '' }}>1
                                        Minute</option>

                                    <option value="1m">1 Minute</option>
                                    <option value="2m">2 Minutes</option>
                                    <option value="5m">5 Minutes</option>
                                    <option value="15m">15 Minutes</option>
                                    <option value="30m">30 Minutes</option>
                                    <option value="60m">60 Minutes</option>
                                    <option value="1d">1 Day</option>
                                    <option value="1wk">1 Week</option>
                                    <option value="1mo">1 Month</option>
                                </select>
                            </div>
                            <div class="form-input1">
                                <label for="range_option">Range</label>
                                <select class="form-select" name="range_option" id="range_option"
                                    style="margin-left: 58px;">
                                    <option value="1d"{{ request('range_option') == '1d' ? ' selected' : '' }}>1 Day
                                    </option>

                                    <option value="1d">1 Day</option>
                                    <option value="5d">5 Days</option>
                                    <option value="1mo">1 Month</option>
                                    <option value="3mo">3 Months</option>
                                    <option value="6mo">6 Months</option>
                                    <option value="1y">1 Year</option>
                                    <option value="2y">2 Years</option>
                                    <option value="5y">5 Years</option>
                                    <option value="10y">10 Years</option>
                                    <option value="ytd">Year to Date</option>
                                    <option value="max">Max</option>
                                </select>
                            </div>
                            <div class="form-input1">
                                <button type="submit" class="search-btn">Cari</button>
                            </div>
                        </form>

                        <div id="chart" class="render_komoditas"></div>
                        <div>
                            @if (isset($data['chart']['result'][0]['meta']))
                                <div class="todo">
                                    <div class="head">
                                        <h3>Metadata Saham</h3>
                                    </div>
                                    <ul class="todo-list">
                                        <li class="not-completed">
                                            <p><strong>Mata Uang:</strong>
                                                {{ $data['chart']['result'][0]['meta']['currency'] }}
                                            </p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Kurs Terakhir:</strong>
                                                {{ $data['chart']['result'][0]['meta']['symbol'] }}</p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Bursa:</strong>
                                                {{ $data['chart']['result'][0]['meta']['exchangeName'] }}
                                            </p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Jenis Instrumen:</strong>
                                                {{ $data['chart']['result'][0]['meta']['instrumentType'] }}</p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Tanggal Perdagangan Pertama:</strong>
                                                {{ date('d-m-Y', $data['chart']['result'][0]['meta']['firstTradeDate']) }}
                                            </p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Waktu Pasar Reguler:</strong>
                                                {{ date('d-m-Y H:i:s', $data['chart']['result'][0]['meta']['regularMarketTime']) }}
                                            </p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Offset GMT:</strong>
                                                {{ $data['chart']['result'][0]['meta']['gmtoffset'] }}</p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Zona Waktu:</strong>
                                                {{ $data['chart']['result'][0]['meta']['timezone'] }}</p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Zona Waktu Bursa:</strong>
                                                {{ $data['chart']['result'][0]['meta']['exchangeTimezoneName'] }}</p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Harga Pasar Reguler:</strong> Rp
                                                {{ $data['chart']['result'][0]['meta']['regularMarketPrice'] }}</p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Tutupan Chart Sebelumnya:</strong> Rp
                                                {{ $data['chart']['result'][0]['meta']['chartPreviousClose'] }}</p>
                                        </li>
                                        <li class="not-completed">
                                            <p><strong>Hint Harga:</strong>
                                                {{ $data['chart']['result'][0]['meta']['priceHint'] }}</p>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="todo">
                        <div class="todo-list not-completed">
                            @if (isset($data['chart']['result'][0]['meta']['symbol']))
                                @php
                                    $tickerWithoutSuffix = str_replace('.JK', '', $data['chart']['result'][0]['meta']['symbol']);
                                @endphp

                                <div class="head-title" style="margin-top:20px">
                                    <a href="{{ route('Sortir Saham', ['ticker' => $tickerWithoutSuffix]) }}"
                                        class="btn-download">
                                        <i class='bx bx-add-to-queue'></i>
                                        <span class="text">Tambah ke Sortir</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                        @php
                            $summaryProfile = $dataProfil['quoteSummary']['result'][0]['summaryProfile'] ?? null;
                        @endphp
                        @if ($summaryProfile)
                            <div class="column">
                                <h3>Profil Perusahaan</h3>
                                <ul>
                                    @isset($summaryProfile['address1'])
                                        <li>{{ $summaryProfile['address1'] }}</li>
                                    @endisset

                                    @isset($summaryProfile['city'])
                                        <li>{{ $summaryProfile['city'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['zip'])
                                        <li>{{ $summaryProfile['zip'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['country'])
                                        <li>{{ $summaryProfile['country'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['phone'])
                                        <li>{{ $summaryProfile['phone'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['fax'])
                                        <li>{{ $summaryProfile['fax'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['website'])
                                        <li>{{ $summaryProfile['website'] }}</li>
                                    @endisset
                                </ul>
                            </div>
                            <div class="column">
                                <ul>
                                    @isset($summaryProfile['industry'])
                                        <li>{{ $summaryProfile['industry'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['industryDisp'])
                                        <li>{{ $summaryProfile['industryDisp'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['sector'])
                                        <li>{{ $summaryProfile['sector'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['sectorDisp'])
                                        <li>{{ $summaryProfile['sectorDisp'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['longBusinessSummary'])
                                        <li>{{ $summaryProfile['longBusinessSummary'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['fullTimeEmployees'])
                                        <li>{{ $summaryProfile['fullTimeEmployees'] }}</li>
                                    @endisset
                                    @isset($summaryProfile['maxAge'])
                                        <li>{{ $summaryProfile['maxAge'] }}</li>
                                    @endisset
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var options = {
                            series: [],
                            chart: {
                                height: 500,
                                type: 'candlestick',
                            },
                        };

                        @if (isset($data))
                            var candleSeries = {!! json_encode($data['chart']['result'][0]['indicators']['quote'][0]) !!};
                            var timestamp = {!! json_encode($data['chart']['result'][0]['timestamp']) !!};

                            var dataSeries = [];
                            for (var i = 0; i < timestamp.length; i++) {
                                var unixTimestamp = timestamp[i];
                                var date = new Date(unixTimestamp * 1000);
                                var formattedDate = date.toLocaleString('en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    hour: 'numeric',
                                    minute: 'numeric',
                                    timeZoneName: 'short'
                                });

                                var dataPoint = {
                                    x: formattedDate,
                                    y: [
                                        candleSeries.open[i],
                                        candleSeries.high[i],
                                        candleSeries.low[i],
                                        candleSeries.close[i]
                                    ]
                                };
                                dataSeries.push(dataPoint);
                            }

                            options.series.push({
                                name: 'candle',
                                type: 'candlestick',
                                data: dataSeries
                            });
                            console.log('Data candleSeries:', candleSeries);
                            console.log('Data timestamp:', timestamp);
                            var chart = new ApexCharts(document.querySelector("#chart"), options);
                            chart.render();
                        @endif
                    });
                </script>
    </main>
</section>
