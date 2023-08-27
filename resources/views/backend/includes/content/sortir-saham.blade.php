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
                            <p><strong>
                                    {{ $dataSortir->symbol }}
                                </strong>
                                <br>
                                Harga Tutup = Rp {{ $dataSortir->close }}
                                <br>
                                harga Terendah = Rp {{ $dataSortir->low }}
                            </p>
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

                    <li class="completed">
                        <p><strong>
                                KODE
                            </strong>
                            <br>
                            CLose Rp 321
                            <br>
                            123 %
                        </p>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
