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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  
      <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('rombels.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputRombel" class="form-label"><strong>Rombel:</strong></label>
            
            <input type="text" name="rombel" class="form-control @error('rombel') is-invalid @enderror" id="inputRombel" placeholder="Rombel">
            @error('rombel')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Submit</button>
      </div>
      </form>

    </div>
    </div>
  </div>
</div>

    <table class="table table-bordered table-striped">
      <tr>
        <th>No</th>
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
<div class=”d-flex justify-content-center mt-4″>
  {{ $rombels->links() }}
</div>
@endsection