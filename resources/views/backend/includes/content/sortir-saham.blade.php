{{-- <section id="content">
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
        </div>
        <br>
        <div class="head-title">
            <a href="{{ route('Process and Sort Stocks Daily') }}" class="btn-download">
                <i class='bx bx-sort'></i>
                <span class="text">Sortir Saham</span>
            </a>
        </div>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>List Sortir</h3>
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
                                    Waktu : {{ $dataSortir->date }}
                                </p>
                            </td>
                            <td>
                                <a
                                    href="{{ route('sortir-saham.destroy', ['id' => $dataSortir->id]) }}"data-id="{{ $dataSortir->id }}">
                                    <i class='bx bxs-trash' style='font-size: 30px; color: #342e37;'></i>
                                </a>
                            </td>
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
                            <td>
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
                            </td>
                            <td>
                                <a
                                    href="{{ route('hasil-sortir.destroy', ['id' => $hasil->id]) }}"data-id="{{ $dataSortir->id }}">
                                    <i class='bx bxs-trash' style='font-size: 30px; color: #342e37;'></i>
                                </a>
                            </td>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
</section>

</main>
<!-- MAIN -->
</section> --}}






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
        </div>
        <br>
        <div class="head-title">
            <a href="{{ route('Process and Sort Stocks Daily') }}" class="btn-download">
                <i class='bx bx-sort'></i>
                <span class="text">Sortir Saham</span>
            </a>
        </div>
        <div class="table-data">
            <div class="todo">
                <div class="head">
                    <h3>List Sortir</h3>
                    <i class='bx bx-plus'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <ul class="todo-list">
                    {{-- @if (isset($sortirData) && count($sortirData) > 0)
    @foreach ($sortirData as $dataSortir)
        <li class="not-completed">
            <td>
                <p><strong>
                    {{ $dataSortir->symbol ?? 'Data tidak tersedia' }}
                </strong>
                <br>
                Harga Buka = Rp {{ $dataSortir->open ?? 'Data tidak tersedia' }}
                <br>
                harga Terendah = Rp {{ $dataSortir->low ?? 'Data tidak tersedia' }}
                <br>
                <br>
                Waktu : {{ $dataSortir->date ?? 'Data tidak tersedia' }}
                </p>
            </td>
            <td>
                <a href="{{ route('sortir-saham.destroy', ['id' => $dataSortir->id]) }}" data-id="{{ $dataSortir->id }}">
                    <i class='bx bxs-trash' style='font-size: 30px; color: #342e37;'></i>
                </a>
            </td>
        </li>
    @endforeach
@else
    <p>Tidak ada data yang ditemukan.</p>
@endif --}}

                    @if (isset($sortirData) && count($sortirData) > 0)
                        @foreach ($sortirData as $dataSortir)
                            <li class="not-completed">
                                <td>
                                    <p><strong>
                                            {{ $dataSortir->symbol }}
                                        </strong>
                                        <br>
                                        Harga Buka = Rp {{ $dataSortir?->y_open }}
                                        <br>
                                        harga Terendah = Rp {{ $dataSortir?->y_low }}
                                        <br>
                                        <br>
                                        Waktu : {{ $dataSortir?->date }}
                                    </p>
                                </td>
                                <td>
                                    <a
                                        href="{{ route('sortir-saham.destroy', ['id' => $dataSortir->id]) }}"data-id="{{ $dataSortir->id }}">
                                        <i class='bx bxs-trash' style='font-size: 30px; color: #342e37;'></i>
                                    </a>
                                </td>
                            </li>
                        @endforeach
                    @else
                        <p>Tidak ada data yang ditemukan.</p>
                    @endif
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
                            <td>
                                <p><strong>
                                        {{ $hasil?->symbol }}
                                    </strong>
                                    <br>
                                    Harga Terendah Sebelumnya = Rp {{ $hasil?->y_low }}
                                    <br>
                                    Harga Buka Hari Ini = Rp {{ $hasil?->open }}
                                    <br>
                                    <br>
                                    Waktu :
                                    {{ $hasil?->created_at->timezone('Asia/Singapore')->format('Y-m-d H:i:s') }}
                                </p>
                            </td>
                            <td>

                                <a href="{{ route('hasil-sortir.destroy', ['id' => $hasil->id]) }}"
                                    data-id="{{ $hasil->id }}"><i class='bx bxs-trash'
                                        style='font-size: 30px; color: #342e37;'></i>
                                </a>
                            </td>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
</section>

</main>
<!-- MAIN -->
</section>
