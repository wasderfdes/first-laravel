@extends('myTemplade')


@section('content')

<div class="container w-25 border p-4 mt-4">
<form method="POST" action="{{ route('categories.update', ['category'=>$category->id]) }}">
   @method('PATCH')         
    @csrf
    @if (session('success'))
        <h6 class="alert alert-sucess">{{ session('success') }}</h6>
    @endif
    @error('name')
        <h6 class="alert alert-danger">{{ $message }}</h6>
    @enderror
    <div class="mb-3">
        <label for="name" class="form-label">Título de la categoría</label>
        <input type="text" name="name" class="form-control" value="{{$category->name}}">
    </div>
    <div class="mb-3">
        <label for="color" class="form-label">Color de la categoría</label>
        <input type="color" name="color" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar categoría</button>
</form>

<div>
    @if ($category->todos->count() > 0)
        @foreach ($category->todos as $todo)
        <div class="row py-1">
            <div class="cold-md-3 d-flex justify-contend-end">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{route('todos-edit', ['id'=>$todo->id])}}">{{$todo->title}}</a>
                </div>
                <form action="{{route('todos-destroy', [$todo->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
    @else

    No hay tareas en esta categoría

    @endif
</div>
</div>
</div>

@endsection