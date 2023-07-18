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
                     <h3>{{ $count }}</h3>
                     <p>Jumlah Komoditas</p>
                 </span>
             </li>

             <li>
                 <i class='bx bxs-group'></i>
                 <span class="text">
                     <h3>2834</h3>
                     <p>Jumlah Request Server</p>
                 </span>
             </li>
             <li>
                 <i class='bx bxs-dollar-circle'></i>
                 <span class="text">
                     <h3>$2543</h3>
                     <p>Total Sales</p>
                 </span>
             </li>
         </ul>


         <div class="table-data">
             <div class="order">
                 <div class="head">
                     <h3>List Komoditas</h3>
                     <i class='bx bx-search'></i>
                     <i class='bx bx-filter'></i>
                 </div>

                 <table>
                     <thead>
                         <tr>
                             <th>Ticker</th>
                             <th>Name</th>
                             <th>Logo</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($stocks['data']['results'] as $result)
                             <tr>
                                 <td><strong>{{ $result['ticker'] }}</strong></td>
                                 <td>{{ $result['name'] }}</td>
                                 <td>
                                     <img src="{{ $result['logo'] }}" alt="Company Logo">
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>

             </div>
             <div class="todo">
                 <div class="head">
                     <h3>Todos</h3>
                     <i class='bx bx-plus'></i>
                     <i class='bx bx-filter'></i>
                 </div>
                 <ul class="todo-list">
                     <li class="completed">
                         <p>Todo List</p>
                         <i class='bx bx-dots-vertical-rounded'></i>
                     </li>
                     <li class="completed">
                         <p>Todo List</p>
                         <i class='bx bx-dots-vertical-rounded'></i>
                     </li>
                     <li class="not-completed">
                         <p>Todo List</p>
                         <i class='bx bx-dots-vertical-rounded'></i>
                     </li>
                     <li class="completed">
                         <p>Todo List</p>
                         <i class='bx bx-dots-vertical-rounded'></i>
                     </li>
                     <li class="not-completed">
                         <p>Todo List</p>
                         <i class='bx bx-dots-vertical-rounded'></i>
                     </li>
                 </ul>
             </div>
         </div>
     </main>
     <!-- MAIN -->
 </section>
