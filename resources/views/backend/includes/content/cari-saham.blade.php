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
