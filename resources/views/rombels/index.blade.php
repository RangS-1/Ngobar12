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
      </tr>
      @forelse ($rombels as $rb)
      <tr>
        <td>{{ $rb->id }}</td>
        <td>{{ $rb->rombel }}</td>
        <td>
          <form action="{{ route('rombels.destroy', $rb->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('rombels.show', $rb->id) }}"><i class="fa-solid fa-list"></i> Show</a>
            <a class="btn btn-primary" href="{{ route('rombels.edit', $rb->id) }}"><i class="fa-solid fa-edit"></i> Edit</a>
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