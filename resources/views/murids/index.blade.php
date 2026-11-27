@extends('layout')
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
          <a class="btn btn-info" href="{{ route('murids.show', $murid->id) }}"><i class="fa-solid fa-list"></i> Show</a>
          <a class="btn btn-primary" href="{{ route('murids.edit', $murid->id) }}"><i class="fa-solid fa-edit"></i> Edit</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteMuridModal{{ $murid->id }}">
            <i class="fa-solid fa-trash"></i> Delete
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
<div class=”d-flex justify-content-center mt-4″>
  {{ $murids->links() }}
</div>
@endsection