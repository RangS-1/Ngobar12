@extends('layouts.app')

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Add Murid Data</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('rayons.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('rayons.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputRayon" class="form-label"><strong>Rayon:</strong></label>
            
            <input type="text" name="rayon" class="form-control @error('rayon') is-invalid @enderror" id="inputRayon" placeholder="Rayon">
            @error('rayon')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>Submit</button>
    </form>

  </div>
</div>
@endsection