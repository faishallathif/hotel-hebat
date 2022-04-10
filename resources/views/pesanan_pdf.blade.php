<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export PDF Pesanan</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-3 " style="width:30rem;">
            <h1 class="text-success">Detail Pesanan</h1>
           <div class="">
                <div class="d-flex justify-content-between">
                    <p>No Pesanan : </p>
                    <p>{{$data->id}}</p>
                </div>
                <div>
                    <p>Nama Pemesanan : {{$data->user->nama}}</p>
                </div>
             
                <div class="d-flex justify-content-between">
                    <p>Tanggal Check In : </p>
                    <p>{{$data->tanggal_masuk}}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p>Tanggal Check Out : </p>
                    <p>{{$data->tanggal_keluar}}</p>
                </div>
                <div>
                    <p>
                      Jumlah Hari : {{$data->jumlah_hari}}
                    </p>
                </div>
                <div>
                    <p>Tipe Kamar : {{$data->kamar->tipe_kamar}}</p>
                </div>
                <div>
                    <p>
                        No Kamar : @foreach ($data->no_kamar as $item)
                        {{ $loop->first ? '' : ',' }}
                            {{$item}}
                        @endforeach 
                    </p>
                </div>
                <div>
                    <p>Harga : {{$data->kamar->harga}}/Hari</p>
                </div>
                <div>
                    <p>Jumlah Kamar : {{$data->jumlah_pesanan}}</p>
                </div>
           </div>
        <div class="d-flex justify-content-between">
            <p>Total : </p>
            <p>{{$data->harga}}</p>
        </div>
    </div>

</body>
</html>