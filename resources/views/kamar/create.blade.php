@extends('layout.template')

@section('content')
<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col py-3">
            <a href="{{ route('kamar.index') }}" class="btn btn-secondary mb-3">KembaliSSS</a>
            <form action="{{ route('kamar.store') }}" method="post">
                @csrf
                <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <div class="mb-3 row">
                        <label for="no_kamar" class="col-sm-2 col-form-label">No Kamar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_kamar" id="no_kamar" value="{{ old('no_kamar') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga" id="harga" value="{{ old('harga') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fasilitas" class="col-sm-2 col-form-label">Fasilitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="fasilitas" id="fasilitas" value="{{ old('fasilitas') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ old('keterangan') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kost_id" class="col-sm-2 col-form-label">Lokasi Kos</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kost_id" id="kost_id">
                                <option value="">Pilih Lokasi Kos</option>
                                @foreach ($lokasiKosOptions as $lokasiKosOption)
                                    <option value="{{ $lokasiKosOption->id }}">{{ $lokasiKosOption->nama_kos }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
