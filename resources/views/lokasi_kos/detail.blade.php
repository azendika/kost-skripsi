@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
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
                    <form class="d-flex" action="{{ url('kamar') }}" method="get">
                        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </form>
                </div>

                <div class="pb-3">
                    <!-- ADD NEW DATA BUTTON -->
                    <a href="{{ url('kamar/create') }}" class="btn btn-primary">+ Tambah Data</a>
                </div>

                <!-- ROOMS LIST TABLE -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-1">No_Kamar</th>
                            <th class="col-md-3">Harga</th>
                            <th class="col-md-4">Keterangan</th>
                            <th class="col-md-2">Fasilitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = $data->firstItem();
                        @endphp
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->no_kamar }}</td>
                            <td>{{ $item->harga }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>{{ $item->fasilitas }}</td>
                            <td>
                                <a href="{{ url('kamar/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm" style="margin-bottom: 7px">Edit</a>
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{url('kamar/'.$item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                
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
