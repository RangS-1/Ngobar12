@extends('layout')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Add Murid Data</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('rombels.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('rombels.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputRombel" class="form-label"><strong>Rombel:</strong></label>
            
            <input type="text" name="rombel" class="form-control @error('rombel') is-invalid @enderror" id="inputRombel" placeholder="Rombel">
            @error('rombel')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Submit</button>
    </form>

  </div>
</div>
@endsection