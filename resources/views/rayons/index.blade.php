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
      <a class="btn btn-primary" href="{{ route('rayons.create') }}"><i class="fa-solid fa-plus"></i> New</a>
    </div>

    <table class="table table-bordered table-striped">
      <tr>
        <th>ID</th>
        <th>Rayon</th>
        <th>Action</th>
      </tr>
      @forelse ($rayons as $ry)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $ry->rayon }}</td>
        <td>
          <a class="btn btn-info" href="{{ route('rayons.show', $ry->id) }}"><i class="fa-solid fa-list"></i> Show</a>
          <a class="btn btn-primary" href="{{ route('rayons.edit', $ry->id) }}"><i class="fa-solid fa-edit"></i> Edit</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRayonModal{{ $ry->id }}">
            <i class="fa-solid fa-trash"></i> Delete
          </button>
          <div class="modal fade" id="deleteRayonModal{{ $ry->id }}" tabindex="-1" aria-labelledby="deleteRayonModalLabel{{ $ry->id }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteRayonModalLabel{{ $ry->id }}">Konfirmasi Hapus Rayon</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Yakin ingin menghapus data rayon <strong>{{ $ry->rayon }}</strong>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form action="{{ route('rayons.destroy', $ry->id) }}" method="POST">
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
@endsection