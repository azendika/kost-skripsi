@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col py-3">
            @if ($errors->any())
            <div class="pt-3">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="pb-3">
                    <!-- SEARCH FORM -->
                    <form class="d-flex" action="{{ url('lokasi_kos') }}" method="get">
                        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </form>
                </div>

                <div class="pb-3">
                    <!-- ADD NEW DATA BUTTON -->
                    <a href="{{ url('lokasi_kos/create') }}" class="btn btn-primary">+ Tambah Data</a>
                </div>

                <!-- ROOMS LIST TABLE -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kos</th>
                            <th>Jumlah Kamar</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = $data->firstItem();
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->nama_kos }}</td>
                            <td>{{ $item->jumlah_kamar }}</td>
                            <td>{{ $item->alamat_kos }}</td>
                            <td>
                                <a href="{{ url('lokasi_kos/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{url('lokasi_kos/'.$item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <a href="{{ url('lokasi_kos/'.$item->id.'/detail') }}" class="btn btn-success btn-sm">Detail</a>
                            </td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                {{ $data->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
