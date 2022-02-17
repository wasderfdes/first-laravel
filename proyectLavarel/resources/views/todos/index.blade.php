@extends('myTemplade')

@section('content')

<div class="container w-25 border p-4 mt-4">
<form method="POST" action="{{ route('todos') }}">
  <div class="mb-3">
    @csrf

    @if (session('success'))
      <h6 class="alert alert-sucess">{{ session('success') }}</h6>
    @endif
    @error('title')
      <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror

    <label for="title" class="form-label">Título de la tarea</label>
    <input type="text" name="title" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
</form>

<div>
  @foreach ($todos as $todo)
    <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
          <a href="{{ route('todos-edit', ['id'=> $todo->id]) }}">{{ $todo->title }}</a>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
          <form method="post" action="{{ route('todos-destroy', [$todo->id]) }}">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm">Eliminar</button>
          </form>
        </div>
      </div>
    @endforeach
  </div>
</div>
</div>

@endsection