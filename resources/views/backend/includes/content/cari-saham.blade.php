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
                    <h3>Cari Saham</h3>
                    <i class="bx bx-search"></i>
                    <i class="bx bx-filter"></i>
                </div>
                <div>
                    <form action="{{ route('cari-saham') }}" method="POST">
                        @csrf
                        <div class="form-input1">
                            <input type="text" name="symbol" placeholder="Symbol atau Ticker.">
                        </div>
                        <div class="form-input1">
                            <select class="form-select" name="interval_option">
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
                            <select class="form-select" name="range_option">
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
                    <div id="chart"></div>
                    {{-- <div>
                        @if (isset($data['chart']['result'][0]['meta']))
                            <div class="todo">
                                <div class="head">
                                    <h3>Metadata Saham

                                        @php
                                            $tickerWithoutSuffix = str_replace('.JK', '', $data['chart']['result'][0]['meta']['symbol']);
                                        @endphp
                                        {{ $tickerWithoutSuffix }}
                                    </h3>
                                    <i class='bx bx-plus'></i>
                                    <i class='bx bx-filter'></i>
                                </div>
                                <ul class="todo-list">
                                    <li class="not-completed">
                                        <p><strong>Mata Uang:</strong>
                                            {{ $data['chart']['result'][0]['meta']['currency'] }}</p>
                                    </li>
                                    <li class="not-completed">
                                        <p><strong>Kurs Terakhir:</strong>
                                            {{ $data['chart']['result'][0]['meta']['symbol'] }}</p>
                                    </li>
                                    <li class="not-completed">
                                        <p><strong>Bursa:</strong>
                                            {{ $data['chart']['result'][0]['meta']['exchangeName'] }}</p>
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
                        @endif
                    </div> --}}
                    <div>
                        {{-- <div>
                            @if (isset($data['chart']['result'][0]['meta']['symbol']))
                                @php
                                    $tickerWithoutSuffix = str_replace('.JK', '', $data['chart']['result'][0]['meta']['symbol']);
                                @endphp
                                <a href="{{ route('Sortir Saham', ['ticker' => $tickerWithoutSuffix]) }}"
                                    class="btn-add">
                                    <i class="bx bx-plus"></i>
                                    <span class="text">Tambah Kesortir</span>
                                </a>
                            @endif
                        </div>
                        <div>
                            @if (isset($dataProfil['quoteSummary']['result'][0]['summaryProfile']))
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['address1'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['address2'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['city'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['zip'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['country'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['phone'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['fax'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['website'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['industry'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['industryDisp'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['sector'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['sectorDisp'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['longBusinessSummary'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['fullTimeEmployees'] }}
                                {{ $dataProfil['quoteSummary']['result'][0]['summaryProfile']['maxAge'] }}
                            @endif
                        </div> --}}
                    </div>
                </div>
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

                    var chart = new ApexCharts(document.querySelector("#chart"), options);
                    chart.render();
                @endif
            });
        </script>

    </main>
    <!-- MAIN -->
</section>
