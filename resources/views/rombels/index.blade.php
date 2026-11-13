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
          <form action="{{ route('murids.destroy', $murid->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('murids.show', $murid->id) }}"><i class="fa-solid fa-list"></i> Show</a>
            <a class="btn btn-primary" href="{{ route('murids.edit', $murid->id) }}"><i class="fa-solid fa-edit"></i> Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</button>
          </form>
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