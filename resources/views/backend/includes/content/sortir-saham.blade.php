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
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>Saham Dimasukkan Kesortir</h3>
                    <i class='bx bx-plus'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <ul class="todo-list">
                    @foreach ($sortirData as $dataSortir)
                        <li class="not-completed">
                            <td>
                                <p><strong>
                                        {{ $dataSortir->symbol }}
                                    </strong>
                                    <br>
                                    Harga Tutup = Rp {{ $dataSortir->close }}
                                    <br>
                                    harga Terendah = Rp {{ $dataSortir->low }}
                                    <br>
                                    <br>
                                    Waktu : {{ $dataSortir->created_at->format('d-m-Y') }}
                                </p>
                            </td>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Saham Tersortir</h3>
                    <i class='bx bx-plus'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <ul class="todo-list">

                    @foreach ($hasilSortir as $hasil)
                        <li class="completed">
                            <p><strong>
                                    {{ $hasil->symbol }}
                                </strong>
                                <br>
                                Harga Terendah Sebelumnya = Rp {{ $hasil->open }}
                                <br>
                                Harga Tutup Hari Ini = Rp {{ $hasil->high }}
                                <br>
                                <br>
                                Waktu : {{ $hasil->created_at }}
                            </p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    @endforeach
                </ul>
            </div>
            <a href="{{ route('Process and Sort Stocks Daily') }}" class="btn btn-primary">Process and Sort Stocks</a>

        </div>
    </main>
    <!-- MAIN -->
</section>
