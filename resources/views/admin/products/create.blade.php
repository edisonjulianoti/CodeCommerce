@extends('admin.index')

@section('content')
    <div class="container">
        <div class="btn-group">
            <a href="{{route('products')}}">
                <button class="btn btn-default">Voltar</button>
            </a>
        </div>
        <hr>

        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach

        <form action="{{ route('products.create') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Valor:</label>
                <input type="text" name="price" class="form-control" value="{{ old('price') }}"/>
            </div>

            <div class="form-group">
                <label>Destaque?:</label>
                <select name="featured">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="form-group">
                <label>Recomenda?:</label>
                <select name="recommend">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>

        </form>

    </div>

@endsection