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
                            <td>
                                <a href="#modal-1" class="hapus-button" data-id="{{ $dataSortir->id }}"><i
                                        class='bx bx-dots-vertical-rounded'></i></a>
                            </td>
                        </li>
                        <div id="modal-1">
                            <a href="#" class="modal__bg"></a>
                            <div class="modal__content small-modal">
                                <div>
                                    <h1 class="content__title">
                                        Rubah Data ?
                                    </h1>
                                    <div class="modal-buttons">
                                        <a href="{{ route('sortir-saham.destroy', ['id' => $dataSortir->id]) }}">
                                            <button class="delete-button">Hapus
                                            </button>
                                        </a>
                                        <button class="update-button">Perbarui</button>
                                    </div>
                                    <div class="content__btn-close">
                                        <a href="#">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <a href="#modal-2"><i class='bx bx-dots-vertical-rounded'></i></a>
                            </td>
                        </li>
                        <div id="modal-2">
                            <a href="#" class="modal__bg"></a>
                            <div class="modal__content small-modal">
                                <div>
                                    <h1 class="content__title">
                                        Rubah Data ?
                                    </h1>
                                    <div class="modal-buttons">
                                        <a href="{{ route('hasil-sortir.destroy', ['id' => $hasil->id]) }}">
                                            <button class="delete-button">Hapus
                                            </button>
                                        </a>
                                        <button class="update-button">Perbarui</button>
                                    </div>
                                    <div class="content__btn-close">
                                        <a href="#">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
            <a href="{{ route('Process and Sort Stocks Daily') }}" class="btn btn-primary">Process and Sort Stocks</a>
        </div>
</section>

</main>
<!-- MAIN -->
</section>
