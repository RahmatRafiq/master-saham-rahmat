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
                <form action="#">
                    <div class="form-input">
                        <input type="number" name="harga_min" id="harga_min" placeholder="Harga Minimum" required>
                    </div>
                    <div class="form-input">
                        <input type="number" name="harga_max" id="harga_max" placeholder="Harga Maksimum" required>
                    </div>
                    <div class="form-input">
                        <select name="parameter_harga" id="parameter_harga" required>
                            <option value="close">Harga Penutupan (Close)</option>
                            <option value="high">Harga Tertinggi (High)</option>
                            <option value="low">Harga Terendah (Low)</option>
                            <option value="open">Harga Pembukaan (Open)</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <select name="waktu" id="waktu" required>
                            <option value="today">Hari Ini</option>
                            <option value="daily">Harian (Daily)</option>
                            <option value="weekly">Mingguan (Weekly)</option>
                            <option value="monthly">Bulanan (Monthly)</option>
                            <option value="yearly">Tahunan (Yearly)</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <button type="submit" class="search-btn">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
