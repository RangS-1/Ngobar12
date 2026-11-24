@extends('layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Edit Data Rayon</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('rayons.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('rayons.update',$rayon) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputRayon" class="form-label"><strong>Rayon:</strong></label>
            <input type="text" name="rayon" value="{{ old('rayon', $rayon->rayon) }}" class="form-control @error('rayon') is-invalid @enderror" id="inputRayon" placeholder="Rayon">
            @error('rayon')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Update</button>
    </form>

  </div>
</div>
@endsection