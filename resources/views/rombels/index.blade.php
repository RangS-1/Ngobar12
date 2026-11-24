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
      <a class="btn btn-primary" href="{{ route('rombels.create') }}"><i class="fa-solid fa-plus"></i> New</a>
    </div>

    <table class="table table-bordered table-striped">
      <tr>
        <th>ID</th>
        <th>Rombel</th>
        <th>Action</th>
      </tr>
      @forelse ($rombels as $rb)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $rb->rombel }}</td>
        <td>
          <a class="btn btn-info" href="{{ route('rombels.show', $rb->id) }}"><i class="fa-solid fa-list"></i> Show</a>
          <a class="btn btn-primary" href="{{ route('rombels.edit', $rb->id) }}"><i class="fa-solid fa-edit"></i> Edit</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRombelModal{{ $rb->id }}">
            <i class="fa-solid fa-trash"></i> Delete
          </button>
          <div class="modal fade" id="deleteRombelModal{{ $rb->id }}" tabindex="-1" aria-labelledby="deleteRombelModalLabel{{ $rb->id }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteRombelModalLabel{{ $rb->id }}">Konfirmasi Hapus Rombel</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Yakin ingin menghapus data rombel <strong>{{ $rb->rombel }}</strong>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <form action="{{ route('rombels.destroy', $rb->id) }}" method="POST">
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