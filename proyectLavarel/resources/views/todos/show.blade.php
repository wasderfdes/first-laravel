@extends('myTemplade')

@section('content')

<div class="container w-25 border p-4 mt-4">
  <form method="POST" action="{{ route('todos-update', ['id'=> $todo->id]) }}">
  <div class="mb-3">
    @method('PATCH')
  
    @csrf

    @if (session('success'))
      <h6 class="alert alert-sucess">{{ session('success') }}</h6>
    @endif
    @error('title')
      <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <label for="title" class="form-label">Título de la tarea</label>
    <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
  </div>
  <button type="submit" class="btn btn-primary">Actualizar nueva</button>
  </form>

</div>

@endsection