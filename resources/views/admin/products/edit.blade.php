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

        <form action="{{ route('products.update', ['id' => $products->id]) }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="name" class="form-control" value="{{ $products->name }}"/>
            </div>

            <div class="form-group">
                <label>Descrição:</label>
                <textarea name="description" class="form-control">{{ $products->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Valor:</label>
                <input type="text" name="price" class="form-control" value="{{ $products->price }}"/>
            </div>

            <div class="form-group">
                <label>Destaque?:</label>
                <select name="featured">
                    <option value="1" @if($products->featured == 1){{ 'selected' }}@endif>Sim</option>
                    <option value="0" @if($products->featured == 0){{ 'selected' }}@endif>Não</option>
                </select>
            </div>

            <div class="form-group">
                <label>Recomenda?:</label>
                <select name="recommend">
                    <option value="1" @if($products->recommend == 1){{ 'selected' }}@endif>Sim</option>
                    <option value="0" @if($products->recommend == 0){{ 'selected' }}@endif>Não</option>
                </select>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>

        </form>
    </div>
@endsection