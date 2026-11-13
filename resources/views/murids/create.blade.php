@extends('layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Add Murid Data</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('murids.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('murids.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputNis" class="form-label"><strong>NIS:</strong></label>
            <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="inputNis" placeholder="NIS">
            @error('nis')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Nama:</strong></label>
            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="inputName" placeholder="Nama">
            @error('nama')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputRombel" class="form-label"><strong>Rombel:</strong></label>
            <select name="rombel" class="form-control @error('rombel') is-invalid @enderror" id="inputRombel">
                <option value="">-- Pilih Rombel --</option>
                @forelse ($rombels as $rb)
                    <option value="{{ $rb->rombel }}" @selected(old('rombel') == $rb->rombel)>{{ $rb->rombel }}</option>
                @empty
                    <option value="" disabled>No Rombel Available</option>
                @endforelse
            </select>
            @error('rombel')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputRayon" class="form-label"><strong>Rayon:</strong></label>
            <input type="text" name="rayon" class="form-control @error('rayon') is-invalid @enderror" id="inputRayon" placeholder="Rayon">
            @error('rayon')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputAlamat" class="form-label"><strong>Alamat:</strong></label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat" placeholder="Alamat" value="{{ old('alamat') }}">
            @error('alamat')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="inputNo_Telp" class="form-label"><strong>No_Telp:</strong></label>
            <input type="number" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" id="inputNo_Telp" placeholder="No_Telp">
            @error('no_telp')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputJenis_Kelamin" class="form-label"><strong>Jenis Kelamin:</strong></label>
            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="inputJenis_Kelamin">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Submit</button>
    </form>

  </div>
</div>
@endsection