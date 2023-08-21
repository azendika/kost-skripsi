@extends('layout.template')

@section('content')
<div class="container-fluid">
    <!-- ... Other HTML content ... -->
    <div class="pb-3">
        <!-- SEARCH FORM -->
        <form class="d-flex" action="{{ route('kamar.index') }}" method="get">
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
                <th class="col-md-2">Lokasi Kos</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $key => $item)
                <tr>
                    <td>{{ $data->firstItem() + $loop->index }}</td>
                    <td>{{ $item->no_kamar }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>{{ $item->fasilitas }}</td>
                    <td>
                        @if ($kamars[$key]->lokasiKos)
                            {{ $kamars[$key]->lokasiKos->nama_kos }}
                        @else
                            No Lokasi
                        @endif
                    </td>
                    <td class="d-flex">
                        <div class="btn-group" role="group">
                            <a href="{{ route('kamar.edit', $item->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="{{ route('kamar.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm me-2">Delete</button>
                            </form>
                            <a href="{{ route('kamar.detail', $item->id) }}" class="btn btn-success btn-sm">Detail</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No data available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
</div>
@endsection
