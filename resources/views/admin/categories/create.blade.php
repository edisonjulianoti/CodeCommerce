@extends('admin.index')

@section('content')

    <div class="container">
        <div class="btn-group">
            <a href="{{route('categories')}}">
                <button class="btn btn-default">Voltar</button>
            </a>
        </div>
        <hr>

        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach

        <form action="{{ route('create-categories') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>

        </form>
    </div>

@endsection


