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
      <a class="btn btn-primary" href="{{ route('murids.create') }}"><i class="fa-solid fa-plus"></i> New</a>
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