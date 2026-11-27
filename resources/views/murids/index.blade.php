@extends('layouts.app')
@section('content')
<div class="card mt-3">
  <h2 class="card-header">
    Belajar CRUD Laravel 12
  </h2>
  <div class="card-body">

    @section('success')
    <div class="alert alert-success">
      

    </div>
    @endsection

    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
    </div>

    <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
            <select name="rayon" class="form-control @error('rayon') is-invalid @enderror" id="inputRayon">
                <option value="">-- Pilih Rayon --</option>
                @forelse ($rayons as $ry)
                    <option value="{{ $ry->rayon }}" @selected(old('rayon') == $ry->rayon)>{{ $ry->rayon }}</option>
                @empty
                    <option value="" disabled>No Rayon Available</option>
                @endforelse
            </select>
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
                <option value="Laki-Laki" @selected(old('jenis_kelamin') === 'Laki-Laki')>Laki-Laki</option>
                <option value="Perempuan" @selected(old('jenis_kelamin') === 'Perempuan')>Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Submit</button>
      </div>
    </form>

    </div>
  </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
      <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Rombel</th>
        <th>Rayon</th>
        <th>Alamat</th>
        <th>No.Telp</th>
        <th>JK</th>
        <th>Action</th>
      </tr>
      @forelse ($murids as $murid)
      <tr>
        <td>{{ $murid->nis }}</td>
        <td>{{ $murid->nama }}</td>
        <td>{{ $murid->rombel }}</td>
        <td>{{ $murid->rayon }}</td>
        <td>{{ $murid->alamat }}</td>
        <td>{{ $murid->no_telp }}</td>
        <td>{{ $murid->jenis_kelamin }}</td>
        <td>
          <a class="btn btn-info" href="{{ route('murids.show', $murid->id) }}"><i class="fa-solid fa-list"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
</svg></a>
          <a class="btn btn-primary" href="{{ route('murids.edit', $murid->id) }}"><i class="fa-solid fa-edit"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
</svg></a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMuridModal{{ $murid->id }}">
            <i class="fa-solid fa-trash"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
          </button>
          <div class="modal fade" id="deleteMuridModal{{ $murid->id }}" tabindex="-1" aria-labelledby="deleteMuridModalLabel{{ $murid->id }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteMuridModalLabel{{ $murid->id }}">Konfirmasi Hapus Murid</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Yakin ingin menghapus data murid <strong>{{ $murid->nama }}</strong> (NIS: {{ $murid->nis }})?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form action="{{ route('murids.destroy', $murid->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="7" class="text-center">Tidak ada Data</td>
      </tr>
      @endforelse
    </table>
</div>
  </div>
</div>
<div class=”d-flex justify-content-center mt-4″>
  {{ $murids->links() }}
</div>
@endsection