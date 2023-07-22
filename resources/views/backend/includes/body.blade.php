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
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3>{{ $response['companies']['count'] }}</h3>
                    <p>Jumlah Komoditas yang Tercatat pada IDX</p>

                </span>
            </li>

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


        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Trend 5 Teratas (Volume)</h3>
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Ticker</th>
                            <th>close</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($response['trending']['results'] as $result)
                            @if ($loop->iteration <= 5)
                                <tr>
                                    <td><strong>{{ $result['ticker'] }}</strong></td>
                                    <td> Rp {{ $result['close'] }}</td>
                                    <td>
                                        Perlembar
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
                <i class='bx bx-plus'></i>
                <i class='bx bx-filter'></i>
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
                            </p>
                            <i class='bx bx-dots-vertical-rounded'></i>
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
            <i class='bx bx-plus'></i>
            <i class='bx bx-filter'></i>
        </div>
        <ul class="todo-list">
            @foreach ($response['top_gainers']['results'] as $topGainer)
                @if ($loop->iteration <= 5)
                    <li class="completed">
                        <p><strong>
                                {{ $topGainer['ticker'] }}
                            </strong>
                            <br>
                            CLose Rp {{ $topGainer['close'] }}
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
