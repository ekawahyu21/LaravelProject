@extends ('layout.app')
@section('title', 'Dashboard page')

@section('content')
<!-- Content Wrapper -->
      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- cek waktu untuk ucapan salam -->
          <!-- <div id="timestamp">
            <span> Tanggal : <b>{{$tanggal}}</b> | Pukul : <b>{{$jam}}</b></span>
            
          </div> -->
          
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            @if(Auth::guard('admin')->check())
            <a href="/pages/cetak_pdf" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            @endif
          </div>
          @if(session('login'))
          @if(Auth::guard('admin')->check() && !Auth::guard('user')->check())
          <div class="alert alert-success alert-dismissible fade show" role="alert">
        
            <strong>Halo, {{$salam}} </strong></br>Selamat Datang, {{Auth::guard('admin')->user()->name }}, 
            Anda Login Sebagai Admin
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div> 
          @elseif(Auth::guard('user')->check() && !Auth::guard('admin')->check())
          <div class="alert alert-success alert-dismissible fade show" role="alert">
      
           <strong>Halo, {{$salam}} </strong></br>Selamat Datang, {{Auth::guard('user')->user()->name }}, 
            Anda Login Sebagai User
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
           @elseif(!session('login') or !Auth::guard('admin')->check() or !Auth::guard('user')->check())
            <div class="alert alert-success alert-dismissible fade show" role="alert">

           <strong>Halo, <span id="timestamp">{{$salam}}</span></strong></br>Silahkan Login Untuk Melanjutkan Mengakses Web :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
            
          @endif
          

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pendapatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.{{ number_format($transaksi) }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Reservation</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$reservasi}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!-- data kamar -->
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Rom</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$datakamar}}</div>
  
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bed fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            @if(session('login'))
            @if(Auth::guard('admin')->check() && !Auth::guard('user')->check())
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <!-- data user -->

                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$datauser}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endif
            @endif
             
    
          </div>

          <!-- Content Row -->

           @if(session('login'))
            @if(Auth::guard('admin')->check())
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data penjualan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div id="myAreaChart"></div>
                </div>
              </div>
            </div>

           
          </div>
          @endif
          @endif

          

        </div>
        <!-- /.container-fluid -->
    </div>
      <!-- End of Main Content -->
      @section('footer')
       <script src="{{ asset('js/highcharts.js') }}"></script>
      <script>
    Highcharts.chart('myAreaChart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Data Pendapatan Bulanan'
    },
    
    xAxis: {
        categories: {!!json_encode($tgl)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'hasil'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Hasil',
        data: {!!json_encode($hasil)!!}

    }]
});
 </script>
      @stop
@endsection