@extends('layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Edit Data Murid</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('murids.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('murids.update',$murid) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputNis" class="form-label"><strong>NIS:</strong></label>
            <input type="number" name="nis" value="{{ old('nis', $murid->nis) }}" class="form-control @error('nis') is-invalid @enderror" id="inputNis" placeholder="NIS">
            @error('nis')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Nama:</strong></label>
            <input type="text" name="nama" value="{{ old('nama', $murid->nama) }}" class="form-control @error('nama') is-invalid @enderror" id="inputName" placeholder="Nama">
            @error('nama')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputRombel" class="form-label"><strong>Rombel:</strong></label>
            <input type="text" name="rombel" value="{{ old('rombel', $murid->rombel) }}" class="form-control @error('rombel') is-invalid @enderror" id="inputRombel" placeholder="Rombel">
            @error('rombel')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputRayon" class="form-label"><strong>Rayon:</strong></label>
            <input type="text" name="rayon" value="{{ old('rayon', $murid->rayon) }}" class="form-control @error('rayon') is-invalid @enderror" id="inputRayon" placeholder="Rayon">
            @error('rayon')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputAlamat" class="form-label"><strong>Alamat:</strong></label>
            <input type="text" name="alamat" value="{{ old('alamat', $murid->alamat) }}" class="form-control @error('alamat') is-invalid @enderror" id="inputAlamat" placeholder="Alamat">
            @error('alamat')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="inputNo_Telp" class="form-label"><strong>No_Telp:</strong></label>
            <input type="text" name="no_telp" value="{{ old('no_telp', $murid->no_telp) }}" class="form-control @error('no_telp') is-invalid @enderror" id="inputNo_Telp" placeholder="No_Telp">
            @error('no_telp')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputJenis_Kelamin" class="form-label"><strong>Jenis Kelamin:</strong></label>
            <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="inputJenis_Kelamin">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-Laki" @selected(old('jenis_kelamin', $murid->jenis_kelamin) === 'Laki-Laki')>Laki-Laki</option>
                <option value="Perempuan" @selected(old('jenis_kelamin', $murid->jenis_kelamin) === 'Perempuan')>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Update</button>
    </form>

  </div>
</div>
@endsection