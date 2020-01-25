@extends ('layout.app')
@section('title', 'Bayar')
@section('content')
@foreach($transaksi as $data)
<div class="container-fluid">
    <div class="card-body">
        
        <div class="row">
            <div class="card shadow mb-4 mx-auto">
                <div class="px-4">
                    <!-- error -->
        @if(session('gagal'))
        <div class="alert alert-warning" role="alert">
            {{session('gagal')}}
        </div>
        @endif
        @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
                    <h1>Checkout</h1>
                    <form method="POST" action="#" id="checkout-from">
                        @csrf
                    <h4 name="total">Total Bayar : Rp. {{number_format($data->total)}}</h4>
                    <input type="text" class="form-control" id="total" name="total" value="{{$data->total}}" hidden>
                        <div class="form-group row">
                            <label for="noTrans" class="col col-form-label">Nomor Transaksi</label>
                            <div class="col-sm-20">
                                <input type="text" class="form-control" name="noTrans" placeholder="Nomor Transaksi" value="{{$data->no_trans}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tglTrans" class="col col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-80">
                                <input type="date" class="form-control" name="tglTrans" value="{{$data->tgl_pesan}}" readonly="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tglTrans" class="col col-form-label">Tanggal Bayar</label>
                            <div class="col-sm-80">
                                <input type="date" class="form-control" name="tglTrans" value="{{$tglTrans}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col col-form-label">Nama Penyewa</label>
                            <div class="col-sm-20">
                                <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{$data->nama}}" readonly>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="bayar" class="col col-form-label">Jumlah Bayar</label>
                            <div class="col-sm-20"> 
            
                                <input type="text" class="form-control" name="bayar" id="bayar" min="0" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kembali" class="col col-form-label">Kembali</label>
                            <div class="col-sm-20">
                                <input type="text" class="form-control" name="kembali" id="kembali" value="0">
                            </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-sm-20">
                            <button type="submit" class="btn btn-success" >Bayar Sekarang</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<script>
    $(document).on("change keyup blur", "#bayar", function() {
        var total = $('#total').val();
        var bayar = $('#bayar').val();
        var kembali = bayar - total;
        $('#kembali').val(kembali);
    });
</script>

@endsection